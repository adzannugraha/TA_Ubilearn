<main class="mdl-layout__content">
<div class="mdl-grid cover-main"></div>
    <div class="mdl-grid">
    <?php if ($this->session->flashdata('insert_asg') == TRUE): ?>
            <div role="alert"  class="alert alert-success alert-dismissible fade in mdl-cell mdl-cell--12-col-desktop mdl-cell--8-col-tablet mdl-cell--2-offset-tablet mdl-cell--12-col-phone">
                <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span>
                </button>
                <p><?php echo $this->session->flashdata('insert_asg')?></p>
            </div>
        <?php endif; ?>
        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--8-col-tablet mdl-cell--2-offset-tablet mdl-cell--12-col-phone">
            <div class="mdl-card mdl-shadow--2dp pie-chart">
                <div class="mdl-card__title" style="display:block;">
                    <h2 class="mdl-card__title-text">Edit Assignment</h2>
                    <div class="mdl-card__subtitle-text">Masukan Detail Assignment</div>
                </div>
                <div class="mdl-card__supporting-text" style="font-size:15px;">
                    <form action="<?php echo base_url().'instruktur/assignment/update_asing'; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputtext3" class="col-sm-2 control-label">Nama Assignment</label>
                            <div class="col-sm-10">
                            <input name="m-nama-asg" type="text" class="form-control" id="inputtext3" value="<?php echo $dataasing->asg_name; ?>" required style="text-transform: capitalize;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputtext3" class="col-sm-2 control-label">Deskripsi</label>
                            <div class="col-sm-10">
                            <textarea name="m-deskripsi-asg" id="textEditor" style="width:100%;text-transform: capitalize;" value=""><?php echo htmlspecialchars($dataasing->asg_text);?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-2" >Waktu Selesai :</label>
                        <div class="input-group date form_datetime col-sm-6" style="padding-left: 15px;padding-right: 15px;"  data-link-field="dtp_input1">
                            <input class="form-control" size="16" type="text" name="asg_date" value="<?php echo $dataasing->asg_duedate ?>" >
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
			            </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="Upload File">Attachment</label>
                            <div class="col-sm-10">
                            <input name="asg-name" class="input-file" type="file" accept="application/pdf" onchange="readURL(this);">
                                <p>*Input file .pdf</p>
                                <p><?php echo $dataasing->asg_attachment?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                            <input style="display:none;" name="asg_id" class="form-control" value="<?php echo $dataasing->asg_id; ?>">
                            </div>
                        </div>
                        <div class="form-group pull-right">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-blue">Selesai</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
        $('.form_datetime').datetimepicker({
        //language:  'fr',
        autoclose: true,
        todayBtn: true,
        format: "yyyy-mm-dd hh:ii",
        pickerPosition: "top-left",
    });
</script>
<!-- <script>
    CKEDITOR.replace( 'ckedit' );
    $("form").submit( function(e) {
        var messageLength = CKEDITOR.instances['ckedit'].getData().replace(/<[^>]*>/gi, '').length;
        if( !messageLength ) {
            alert( 'Masukkan Deskripsi Assignment' );
            e.preventDefault();
        };
    });
</script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#textEditor').summernote({
            height: 200, // set editor height // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            dialogsInBody: true,
            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    sendFile(files[0], editor, welEditable);
                }
            }
        });

        function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);//You can append as many data as you want. Check mozilla docs for this
            $.ajax({
                data: data,
                type: "POST",
                url: '<?php echo base_url().'instruktur/Content/uplGambar' ?>',
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    $('#textEditor').summernote('editor.insertImage', url);
                },
                error: function(){
                    alert('Error');
                }
            });
        }
    });

    $("form").submit( function(e) {
        var a = $('#textEditor').val();
        if(a == ''){
            alert('Deskripsi Assignment tidak boleh kosong');
            e.preventDefault();
        }
    });
</script>
<!-- <style type="text/css">
    .note-view {
        display: none;
    }
</style> -->