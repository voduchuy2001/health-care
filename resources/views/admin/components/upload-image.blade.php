<div class="mb-3">
    <div class="form-group">
        <label for="image">Ảnh</label>
        <div class="form-upload-image">
            <input type="file" name="image" class="upload-image" id="load-image" onchange="previewImage(this)">

            <p onclick="loadImage()">
                Tải ảnh lên.
            </p>
        </div>

        <div id="preview-image-box" class="preview-image-box">
            <div class="d-flex align-items-center justify-center">
                <img src="" id="preview-image" class="preview-image">

                <p class="text-danger change-image" onclick="removePreviewImage()">
                    <i class="ri-delete-bin-5-line"></i>
                    Xóa ảnh
                </p>
            </div>
        </div>

        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

@section('scripts')
<script>
    const loadImage = () => {
        document.querySelector('#load-image').click()
    }
    
    const previewImage = (input) => { 
        let file = $("input[type=file]").get(0).files[0];

        if (file) {
            let reader = new FileReader();

            reader.onload = () => {
                $("#preview-image").attr('src', reader.result);
                $("#preview-image-box").css('display', 'block');
            }
            $(".form-upload-image").css('display', 'none');
            reader.readAsDataURL(file);
        }
    }

    const removePreviewImage = () => {
        $("#preview-image").attr('src',"");
        $("#preview-image-box").css('display', 'none');
        $(".form-upload-image   ").css('display', 'block');
    }
</script>
@endsection

@section('css')
<style>
    .upload-image {
        display: none;
    }

    .preview-image-box {
        display: none;
    }

    .preview-image {
        width: 7.5rem;
        height: 7.5rem;
        border-radius: 100%;
    }

    .form-upload-image {
        width: 7.5rem;
        height: 7.5rem;
        border: 1px dashed #b1b1b1;
        border-radius: 100%;
    }

    .form-upload-image p {
        text-align: center;
        line-height: 120px;
        cursor: pointer;
    }

    .change-image {
        cursor: pointer;
    }
</style>
@endsection