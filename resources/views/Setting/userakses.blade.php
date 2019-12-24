
<!--Author      : @arboshiki-->
<div class="m-portlet__body">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Checkable Tree
                </h3>
            </div>
        </div>
    </div>
<div class="row padding-bottom-15">
    <form action="#" method="post" id="formsubmit">
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-md-6">
                <label class="control-label">Posisi</label>
                <select name="posisi" id="posisi" class="form-control" id="Selectbox">
                    <option value="0">-</option>
                    @foreach ($posisi as $row)
                        @if ($row->id == $data->posisi)
                        <option selected value="{{$row->id}}">{{$row->posisi}}</option>
                        @else
                        <option value="{{$row->id}}">{{$row->posisi}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="control-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="{{$data->nama_lengkap}}" />
            </div>
            <div class="col-md-6">
                <label class="control-label">Perusahaan</label>
                <select name="perusahaan" class="form-control" id="perusahaan">
                    <option value="0">-</option>
                    @foreach ($master_leasing as $row)
                        @if ($row->id_leasing == $data->perusahaan)
                        <option selected value="{{$row->id_leasing}}">{{$row->nama_leasing}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="control-label">Cabang</label>
                <select name="cabang" class="form-control" id="cabang">
                    <option value="0">-</option>
                    @foreach ($master_leasing_cabang as $row)
                        @if ($row->id_leasing_cabang == $data->cabang)
                        <option selected value="{{$row->id_leasing_cabang}}">{{$row->nama_ls_cabang}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="control-label">Nama User</label>
                <input type="text" name="name" class="form-control" value="{{$data->name}}"/>
            </div>
            <div class="col-md-6">
                <label class="control-label">Password</label>
                <input type="password" name="password" class="form-control" value="{{$data->password}}"/>
            </div>
            <div class="col-md-6 col-md-offset-0">
                <label class="control-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{$data->email}}"/>
            </div>
            <div class="col-md-12 padding-bottom-15">
                <label class="control-label">Keterangan</label>
                <textarea name="keterangan" class="form-control">{{$data->keterangan}}</textarea>
            </div>
            <div class="col-md-12 padding-bottom-15">
                <div id="treeview">
                    <input type="hidden" name="akses_user" id="akses_user">
                    <div id="jstree-demo2"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input id="submit" type="submit" class="btn btn-info btn-pretty" value="Simpan" />
            </div>
        </div>
    </form>
    </div>

<div class="add_category">
    <form action="#">
    <input type="text" name="category_name">
    <input type="button" value="save" class="add_new_category">
    </form>
</div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#formsubmit').on('submit', function (e) {
                var arr = [];
                var itung = 0;
                var selectedElmsIds = [];
                var selectedElms = $('#jstree-demo2').jstree("get_selected", true);
                $.each(selectedElms, function() {
                    arr[itung] = this.id;
                    itung++;
                    // alert(this.id)
                });

                $("#akses_user").val(arr.join());

                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                  type: 'POST',
                  url : "user/{{$action}}/{{$user}}",
                  data: formData,
                  contentType: false,
                  cache: false,
                  processData:false,
                  success : function (data, status) {
                    window.location.replace("#settinguser")
                  }
                });
            });

            $("#posisi").change(function() {
                $.post("./dataj",
                {
                    nama: $("#posisi").val(),
                    jenis : "leasing",
                    '_token': $('meta[name=csrf-token]').attr('content')
                },
                function(data, status){
                    $('#perusahaan').empty();
                    $('#cabang').empty();
                    // $('#cabang').empty();
                    $('#perusahaan').append('<option value="0"> </option>');
                    data.forEach(function(item){
                      if(item.nama_asuransi != null){
                        $('#perusahaan').append('<option value=\''+item.list+'\'>'+item.nama_asuransi+'</option>');
                      }else {
                        $('#perusahaan').append('<option value=\''+item.list+'\'>'+item.nama_leasing+'</option>');
                      }

                    });
                });
            });

            $("#perusahaan").change(function() {
                $.post("./dataj",
                {
                    nama: $("#perusahaan").val(),
                    jenis : "cabang",
                    posisi : $("#posisi").val(),
                    '_token': $('meta[name=csrf-token]').attr('content')
                },
                function(data, status){
                    $('#cabang').empty();
                    $('#cabang').append('<option value="0"> </option>');
                    data.forEach(function(item){
                      if(item.nama_as_cabang != null){
                        $('#cabang').append('<option value=\''+item.id+'\'>'+item.nama_as_cabang+'</option>');
                      }else {
                        $('#cabang').append('<option value=\''+item.id+'\'>'+item.nama_ls_cabang+'</option>');
                      }

                    });
                    // alert(data);
                });
            });

        });

        LobiAdmin.loadScript([
            'js/plugin/jstree/jstree.min.js'
        ], initPage);

        function initPage(){
            $('.panel').lobiPanel({
                editTitle: false,
                reload: false,
                sortable: true
            });
            (function(){
                $('#jstree-demo2').jstree({
                    plugins: ['checkbox', 'types'],
                    "types": {
                        "default": {
                            icon: 'fa fa-folder text-orange'
                        },
                        "css":{
                            icon: 'fa fa-file-code-o text-danger'
                        },
                        "less":{
                            icon: 'fa fa-file-code-o text-danger'
                        },
                        html: {
                            icon: 'fa fa-globe text-info'
                        },
                        js: {
                            icon: 'fa fa-file-text-o text-warning-darker'
                        },
                        img: {
                            icon: 'fa fa-file-image-o text-primary'
                        },
                        svg: {
                            icon: 'fa fa-file-image-o text-primary'
                        }
                    },
                    'core' : {
    //                    themes: {
    //                        name: 'proton',
    //                        responsive: true
    //                    },
                        'data' : [
                            {
                                id: '0',
                                "text" : "Root",
                                state: {
                                    opened: true
                                },
                                "children" : [
                                    {
                                        id: '1',
                                        text: 'Client',
                                        children: [
                                            {
                                                text: 'Penutupan Satuan',
                                                type: 'css',
                                                id: '6'
                                            },
                                            {
                                                text: 'Penutupan Kumpulan',
                                                type: 'css',
                                                id: '7'
                                            },
                                            {
                                                text: 'Data Klaim',
                                                type: 'css',
                                                id: '8'
                                            },
                                            {
                                                text: 'Data REfund',
                                                type: 'css',
                                                id: '9'
                                            }
                                        ]
                                    },
                                    {
                                        id: '2',
                                        text: 'Admin',
                                        children: [
                                            {
                                                text: 'Form Upload Dokumen',
                                                type: 'less',
                                                id: '10'
                                            },
                                            {
                                                text: 'Form Approve Dokumen',
                                                type: 'less',
                                                id: '11'
                                            }
                                        ]
                                    },
                                    {
                                        id: '3',
                                        text: 'Asuransi',
                                        children: [
                                            {
                                                text: 'Form Update Dokumen',
                                                type: 'svg',
                                                id: '12'
                                            }
                                        ]
                                    },
                                    {
                                        id: '4',
                                        text: "Viewer",
                                        children: [
                                            {
                                                text: 'Report Dokumen',
                                                type: 'js',
                                                id: '13'
                                            }
                                        ]
                                    },
                                    {
                                        id: '16',
                                        text: "Endorsement Polis",
                                        children: [
                                            {
                                                text: 'Endorse Polis Material',
                                                type: 'js',
                                                id: '17'
                                            },
                                            {
                                                text: 'Endorse Polis Non-Material',
                                                type: 'js',
                                                id: '18'
                                            },
                                            {
                                                text: 'Approval',
                                                type: 'js',
                                                id: '20'
                                            }
                                        ]
                                    },
                                    {
                                        id: '5',
                                        text: "Setting",
                                        children: [
                                            {
                                                text: 'Akses User',
                                                type: 'img',
                                                id: '14'
                                            },
                                            {
                                                text: 'Configuration',
                                                type: 'img',
                                                id: '15'
                                            }
                                        ]
                                    },

                                ]
                            }
                        ]
                    }
                });
                $('#jstree-demo2').on('ready.jstree', function (e, data) {
                    $(this).addClass('jstree-custom-checkboxes');
                    @foreach ($akses_user as $row)
                        $(this).jstree("select_node","#"+{{$row->akses}});
                    @endforeach
                });
                $('#jstree-demo2').on('open_node.jstree', function (e, data) {
                    data.instance.set_icon(data.node, "fa fa-folder-open text-orange");
                });
                $('#jstree-demo2').on('close_node.jstree', function (e, data) {
                    data.instance.set_icon(data.node, "fa fa-folder text-orange");
                });
                $("#jstree-demo2").jstree("select_node","#3");
            })();

        }
        $(document).ready(function() {

        });
    </script>
</div>
