@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.workshop.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.workshops.update", [$workshop->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.workshop.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $workshop->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workshop.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="content">{{ trans('cruds.workshop.fields.content') }}</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content" required>{{ old('content', $workshop->content) }}</textarea>
                @if($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workshop.fields.content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="images">{{ trans('cruds.workshop.fields.images') }}</label>
                <div class="needsclick dropzone {{ $errors->has('images') ? 'is-invalid' : '' }}" id="images-dropzone">
                </div>
                @if($errors->has('images'))
                    <div class="invalid-feedback">
                        {{ $errors->first('images') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workshop.fields.images_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="video">{{ trans('cruds.workshop.fields.video') }}</label>
                <textarea class="form-control {{ $errors->has('video') ? 'is-invalid' : '' }}" name="video" id="video">{{ old('video', $workshop->video) }}</textarea>
                @if($errors->has('video'))
                    <div class="invalid-feedback">
                        {{ $errors->first('video') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.video_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_at">{{ trans('cruds.workshop.fields.start_at') }}</label>
                <input class="form-control datetime {{ $errors->has('start_at') ? 'is-invalid' : '' }}" type="text" name="start_at" id="start_at" value="{{ old('start_at', $workshop->start_at) }}" required>
                @if($errors->has('start_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workshop.fields.start_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_at">{{ trans('cruds.workshop.fields.end_at') }}</label>
                <input class="form-control datetime {{ $errors->has('end_at') ? 'is-invalid' : '' }}" type="text" name="end_at" id="end_at" value="{{ old('end_at', $workshop->end_at) }}">
                @if($errors->has('end_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workshop.fields.end_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quiz">{{ trans('cruds.workshop.fields.quiz') }}</label>
                <input class="form-control {{ $errors->has('quiz') ? 'is-invalid' : '' }}" type="text" name="quiz" id="quiz" value="{{ old('quiz', $workshop->quiz) }}">
                @if($errors->has('quiz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quiz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workshop.fields.quiz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="responsible_id">{{ trans('cruds.workshop.fields.responsible') }}</label>
                <select class="form-control select2 {{ $errors->has('responsible') ? 'is-invalid' : '' }}" name="responsible_id" id="responsible_id" required>
                    @foreach($responsibles as $id => $responsible)
                        <option value="{{ $id }}" {{ ($workshop->responsible ? $workshop->responsible->id : old('responsible_id')) == $id ? 'selected' : '' }}>{{ $responsible }}</option>
                    @endforeach
                </select>
                @if($errors->has('responsible'))
                    <div class="invalid-feedback">
                        {{ $errors->first('responsible') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workshop.fields.responsible_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="evaluation">{{ trans('cruds.workshop.fields.evaluation') }}</label>
                <input class="form-control {{ $errors->has('evaluation') ? 'is-invalid' : '' }}" type="text" name="evaluation" id="evaluation" value="{{ old('evaluation', $workshop->evaluation) }}">
                @if($errors->has('evaluation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('evaluation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workshop.fields.evaluation_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/workshops/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $workshop->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>
 
<script>
    var uploadedImagesMap = {}
Dropzone.options.imagesDropzone = {
    url: '{{ route('admin.workshops.storeMedia') }}',
    maxFilesize: 50, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
      uploadedImagesMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImagesMap[file.name]
      }
      $('form').find('input[name="images[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($workshop) && $workshop->images)
          var files =
            {!! json_encode($workshop->images) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection