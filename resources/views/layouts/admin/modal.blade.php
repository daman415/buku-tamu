<!--Modal-->

<div class="modal fade" id="photoModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Capture Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div id="my_camera" class="d-block mx-auto rounded overflow-hidden"></div>
                </div>
                <div id="results" class="d-none"></div>
                <form method="post" id="photoForm">
                    <input type="hidden" id="photoStore" name="photoStore" value="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning mx-auto text-white" id="takephoto">Capture Photo</button>
                <button type="button" class="btn btn-warning mx-auto text-white d-none" id="retakephoto">Retake</button>
                <button type="submit" class="btn btn-warning mx-auto text-white d-none" id="uploadphoto" form="photoForm">Upload</button>
            </div>
        </div>
    </div>
</div>
