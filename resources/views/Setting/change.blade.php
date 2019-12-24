<div class="m-content">
  <div class="row">
    <div class="col-lg-12">
      <!--begin::Portlet-->
      <div class="m-portlet m-portlet--accent m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_1">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <span class="m-portlet__head-icon">
                <i class="flaticon-file"></i>
              </span>
              <h3 class="m-portlet__head-text">
                Form Change Password
              </h3>
            </div>
          </div>
      </div>
      <!--begin::Form-->
      <!-- @ -->
      <!-- <form class="m-form m-form--fit m-form--label-align-right" id="FormPenutupanSatuan" method="post" enctype="multipart/form-data" action> -->
        <div class="m-portlet__body">
          <div class="m-portlet__body">
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="FormPenutupanSatuan" method="post" enctype="multipart/form-data" action>
              <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label class="">
                      Password Lama:
                    </label>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="password" class="form-control m-input m-input--air m-input--pill" id="passwordLama" name="password_lama" aria-describedby="emailHelp" placeholder="Enter password lama" required>
                    <div>
                    <span class="m-form__help">
                      <!-- Please enter credit number -->
                    </span>
                  </div>
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <label class="">
                      Password Baru
                    </label>
                    <input type="password" class="form-control m-input m-input--air m-input--pill" id="PasswordBaru" name="password_baru" aria-describedby="emailHelp" placeholder="Enter password baru" required>
                    
                    <div>
                    <span class="m-form__help">
                      <!-- Please enter debitur -->
                    </span>
                  </div>
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <label class="">
                      Ulangi Password
                    </label>
                    <input type="password" class="form-control m-input m-input--air m-input--pill" id="ulangiPassword" name="ulangi_password" aria-describedby="emailHelp" placeholder="Enter ulang password" required>
                    <div>
                    <span class="m-form__help">
                      <!-- Please enter debitur -->
                    </span>
                  </div>
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <input type="checkbox" class="showPassword1">Show Password
                    <div>
                    <span class="m-form__help">
                      <!-- Please enter debitur -->
                    </span>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                      <div class="row">
                        <button type="submit" id="ProsesUpdatePass" name="ProsesUpdatePass" class="btn btn-info">
                          Update
                          <i class="flaticon-file-1"></i>
                        </button>
                        <!-- <div class="col-lg-12 m--align-right">
                          <button type="submit" id="kirimKeAsuransi" name="kirimKeAsuransi" class="btn btn-accent">
                            <i class="flaticon-paper-plane"></i>
                            Kirim Ke Asuransi
                          </button>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!--end::Form-->
              </form>
            </div>
            <!--end::Portlet-->
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="m-portlet">
  <!-- <div class="m-portlet__head">
    <div class="m-portlet__head-tools">
      <ul class="m-portlet__nav">
        <li class="m-portlet__nav-item">
          <button class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
            <i class="la la-send"></i>
            Kirim Ke Asuransi
          </button>
          <!-- <a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air"> -->
        <!-- </li>
        <li class="m-portlet__nav-item"></li>
        <li class="m-portlet__nav-item">
          <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
            <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
              <i class="la la-ellipsis-h m--font-brand"></i>
            </a>
            <div class="m-dropdown__wrapper">
              <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
              <div class="m-dropdown__inner">
                            <div class="m-dropdown__body">
                              <div class="m-dropdown__content">
                                <ul class="m-nav">
                                  <li class="m-nav__section m-nav__section--first">
                                    <span class="m-nav__section-text">
                                      Quick Actions
                                    </span>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-share"></i>
                                      <span class="m-nav__link-text">
                                        Create Post
                                      </span>
                                    </a>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-chat-1"></i>
                                      <span class="m-nav__link-text">
                                        Send Messages
                                      </span>
                                    </a>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                      <span class="m-nav__link-text">
                                        Upload File
                                      </span>
                                    </a>
                                  </li>
                                  <li class="m-nav__section">
                                    <span class="m-nav__section-text">
                                      Useful Links
                                    </span>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-info"></i>
                                      <span class="m-nav__link-text">
                                        FAQ
                                      </span>
                                    </a>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                      <span class="m-nav__link-text">
                                        Support
                                      </span>
                                    </a>
                                  </li>
                                  <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                                  <li class="m-nav__item m--hide">
                                    <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                      Submit
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div> - -->
</div>
<script type="text/javascript">
    LobiAdmin.loadScript([
        'assets/app/dataTables/jquery.dataTables.min.js',
        'js/plugin/select2/select2.min.js'
    ], function(){
            LobiAdmin.loadScript([
            'assets/vendors/custom/datatables/datatables.bundle.js',
            'assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js',
            'js/plugin/datatables/dataTables.select.min.js',
            'js/plugin/bootstrap-datepicker/bootstrap-datepicker.min.js',
            'assets/demo/default/custom/components/portlets/tools.js',
            ],initPage);
            });

   

    $(document).ready(function() {

      var submitActor = null;
      var $form = $('#FormPenutupanSatuan');
      var $submitActors = $form.find('button[type=submit]');
      var $addEventModal = $('#addEventModal');
      $addEventModal.appendTo('body');
      var $updateEventModal = $('#updateEventModal');
      $updateEventModal.appendTo('body');
      var $form_modall = $('#form-update-modal');

      $form.submit( function (e) {
        e.preventDefault();
        if (null === submitActor) {
          // return first button if nothing else
          submitActor = $submitActors[0];
        }

        var formData = new FormData(this);

        var buttonPressed = submitActor.name;
        // console.log(submitActor.name);

        switch (buttonPressed) {
          case 'ProsesUpdatePass':
          var pass1 = formData.get('password_baru');
          var pass2 = formData.get('ulangi_password');
          if(pass1 != pass2){
            alert('Password Baru Dengan Konfirm Password Tidak Sama');
             
          }else{
             $.ajax({
                type: 'POST',
                url : "./ubah-password",
                enctype: 'multipart/form-data',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success : function (data) {
                // if(data.errors){
                alert(data.message);
                // reloadtable2();

                // @if ($errors->has('email'))
                //                     <span class="help-block">
                //                         <strong>{{ $errors->first('email') }}</strong>
                //                     </span>
                //                 @endif
                // }
              }
              });
          }
            break;
            default:

          }
      });

      $submitActors.click(function(event) {
      submitActor = this;
      });

      $('.showPassword1').on('change',function(){

          var isChecked = $(this).prop('checked');
          // alert(isChecked);
          if (isChecked) {
            $('#FormPenutupanSatuan').find('#passwordLama').attr('type','text');
            $('#FormPenutupanSatuan').find('#PasswordBaru').attr('type','text');
            $('#FormPenutupanSatuan').find('#ulangiPassword').attr('type','text');
          } else {
            $('#FormPenutupanSatuan').find('#passwordLama').attr('type','Password');
            $('#FormPenutupanSatuan').find('#PasswordBaru').attr('type','Password');
            $('#FormPenutupanSatuan').find('#ulangiPassword').attr('type','Password');
          }
        });
      });
</script>

