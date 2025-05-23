@extends('backEnd.master')
@section('title') 
@lang('admin.student_certificate')
@endsection
@push('css')
    <style>
        .certificate-middle {
            margin-bottom: 280px;
        }

        .student-certificate .certificate-position {
            position: absolute;
            top: 19%;
        }
        .school-table .dropdown.show .dropdown-toggle:after {
            top: 0 !important;
            left: 0 !important;
        }

        .modal-body {
            overflow: auto;
        }

        .student-certificate {
            width: 990px;
            height: 740px;
        }


    </style>
@endpush

@section('mainContent')
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('admin.student_certificate')</h1>
            <div class="bc-pages">
                <a href="{{route('dashboard')}}">@lang('common.dashboard')</a>
                <a href="#">@lang('admin.admin_section')</a>
                <a href="#">@lang('admin.student_certificate')</a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        @if(isset($certificate))
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="{{route('student-certificate')}}" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    @lang('common.add')
                </a>
            </div>
        </div>
        @endif
        <div class="row">
           
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        @if(isset($certificate))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('student-certificate-update',$certificate->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                        @else
                          @if(userPermission("student-certificate"))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student-certificate-store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        @endif
                        @endif
                        <div class="white-box">

                        <div class="main-title">
                            <h3 class="mb-15">@if(isset($certificate))
                                    @lang('admin.edit_certificate')
                                @else
                                    @lang('admin.add_certificate')
                                @endif
                              
                            </h3>
                        </div>
                            <div class="add-visitor">
                                {{-- <div class="row">
                                    <div class="col-lg-12">
                                        <label>@lang('student.certificate_type') <span class="text-danger"></span></label>
                                        <select class="primary_select" name="certificate_type" id="certificate_type">
                                            <option data-display="@lang('student.certificate_type')" value="">@lang('student.certificate_type')</option>
                                            <option data-string="Normal" value="">Normal</option>
                                            <option data-string="Arabic" value="arabic" >Arabic</option>
                                        </select>
                                        @if ($errors->has('certificate_type'))
                                        <span class="text-danger invalid-select">
                                            {{ @$errors->first('certificate_type') }}
                                        </span>
                                        @endif
                                    </div>
                                </div> --}}
                                <div class="row ">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label>@lang('admin.certificate_name') <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                type="text" name="name" autocomplete="off" value="{{isset($certificate)? $certificate->name: old('name')}}">
                                            <input type="hidden" name="id" value="{{isset($certificate)? $certificate->id: ''}}">
                                            
                                            @if ($errors->has('name'))
                                            <span class="text-danger" >
                                                {{ $errors->first('name') }}
                                            </span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label>@lang('admin.header_left_text')<span></span></label>
                                            <input class="primary_input_field{{ $errors->has('header_left_text') ? ' is-invalid' : '' }}"
                                                type="text" name="header_left_text" autocomplete="off" value="{{isset($certificate)? $certificate->header_left_text: old('header_left_text')}}">
                                           
                                            @if ($errors->has('header_left_text'))
                                            <span class="text-danger" >
                                                {{ $errors->first('header_left_text') }}
                                            </span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label>@lang('common.date') <span></span></label>
                                            <div class="primary_datepicker_input">
                                                <div class="no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="">
                                                            <input class="primary_input_field primary_input_field date form-control" id="startDate" type="text" name="date" autocomplete="off" value="{{isset($certificate)? date('m/d/Y', strtotime($certificate->date)): date('m/d/Y')}}">
                                                        </div>
                                                    </div>
                                                    <button class="btn-date" data-id="#startDate" type="button">
                                                        <label class="m-0 p-0" for="startDate">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </label>
                                                    </button>
                                                </div>
                                            </div>
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        </div>
                                    </div>
                                </div>
                               

                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label>@lang('admin.body_max_character_lenght_500') <span></span></label>
                                            <textarea class="primary_input_field" cols="0" rows="4" name="body" maxlength="500">{{isset($certificate)? $certificate->body: old('body')}}</textarea>

                                            @if($errors->has('body'))
                                                <span class="error text-danger">{{ $errors->first('body') }}</span>
                                            @endif
                                        </div>
                                        <span class="text-primary">
                                            [name] [dob] [present_address] [guardian] [created_at] [admission_no] [roll_no]  [gender] [admission_date] [category] [cast] [father_name] [mother_name] [religion] [email] [phone]  @if (moduleStatusCheck('Lms')) [course_name] @endif
                                            @if(moduleStatusCheck('University'))
                                            [arabic_name] [faculty] [session] [department] [academic] [semester] [semester_label] [graduation_date]
                                            @else 
                                            [class] [section]
                                            @endif 
                                        </span>
                                        @if (moduleStatusCheck('Lms'))
                                            <code class="d-block">For Lms Certificate make  take the [name] and [course_name] variable</code>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 mt-20">
                                        <div class="primary_input">
                                            <label for="font_size">@lang('admin.body_font') <span class="text-danger"></span></label>
                                            <select class="primary_select form-control" name="body_font_family" id="font-family">
                                                <option data-display=" @lang('admin.body_font')" value=""> @lang('admin.body_font')</option>
                                                <option value="Arial" {{isset($certificate) ? ($certificate->body_font_family == 'Arial' ? 'selected' : ''):''}} >Arial</option>
                                                <option value="Arial Black" {{isset($certificate) ? ($certificate->body_font_family == 'Arial Black' ? 'selected' : '') :''}} >Arial Black</option>
                                                <option value="Pinyon Script" {{isset($certificate) ? ($certificate->body_font_family == 'Pinyon Script' ? 'selected' : '') :''}} >Pinyon Script</option>
                                                <option value="Comic Sans MS" {{isset($certificate) ? ($certificate->body_font_family == 'Comic Sans MS' ? 'selected' : '') :''}} >Comic Sans MS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-20">
                                        <div class="primary_input">
                                            <label>@lang('admin.font_size')<span class="text-danger">*</span></label>
                                            <input class="primary_input_field{{ $errors->has('body_font_size') ? ' is-invalid' : '' }} body_font_size" 
                                                type="text" name="body_font_size" placeholder="Ex: 2em" autocomplete="off" value="{{isset($certificate)? $certificate->body_font_size: old('body_font_size')}}">
                                           
                                          
                                            @if ($errors->has('body_font_size'))
                                            <span class="text-danger" >
                                                {{ $errors->first('body_font_size') }}
                                            </span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15" id="body_two_part">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label>@lang('admin.body_two_max_character_lenght_500') <span></span></label>
                                            <textarea class="primary_input_field" cols="0" rows="4" name="body_two" maxlength="500">{{isset($certificate)? $certificate->body_two: old('body_two')}}</textarea>
                                            

                                            @if($errors->has('body_two'))
                                                <span class="error text-danger">{{ $errors->first('body_two') }}</span>
                                            @endif
                                        </div>
                                        <span class="text-primary">
                                            [name] [dob] [present_address] [guardian] [created_at] [admission_no] [roll_no]  [gender] [admission_date] [category] [cast] [father_name] [mother_name] [religion] [email] [phone]
                                            @if(moduleStatusCheck('University'))
                                            [arabic_name] [faculty] [session] [department] [academic] [semester] [semester_label] [graduation_date]
                                            @else 
                                            [class] [section]
                                            @endif 
                                        </span>
                                    </div>
                                   
                                </div>


                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label>@lang('admin.footer_left_text') <span></span></label>
                                            <input class="primary_input_field{{ $errors->has('footer_left_text') ? ' is-invalid' : '' }}"
                                                type="text" name="footer_left_text" autocomplete="off" value="{{isset($certificate)? $certificate->footer_left_text: old('footer_left_text')}}">
                                            
                                          
                                            @if ($errors->has('footer_left_text'))
                                            <span class="text-danger" >
                                                {{ $errors->first('footer_left_text') }}
                                            </span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label>@lang('admin.footer_center_text')<span></span></label>
                                            <input class="primary_input_field{{ $errors->has('footer_center_text') ? ' is-invalid' : '' }}"
                                                type="text" name="footer_center_text" autocomplete="off" value="{{isset($certificate)? $certificate->footer_center_text: old('footer_center_text')}}">
                                            
                                          
                                            @if ($errors->has('footer_center_text'))
                                            <span class="text-danger" >
                                                {{ $errors->first('footer_center_text') }}
                                            </span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label>@lang('admin.footer_right_text')<span></span></label>
                                            <input class="primary_input_field{{ $errors->has('footer_right_text') ? ' is-invalid' : '' }}"
                                                type="text" name="footer_right_text" autocomplete="off" value="{{isset($certificate)? $certificate->footer_right_text: old('footer_right_text')}}">
                                           
                                          
                                            @if ($errors->has('footer_right_text'))
                                            <span class="text-danger" >
                                                {{ $errors->first('footer_right_text') }}
                                            </span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12 mb-20">
                                        <label class="primary_input_label" for="">
                                            {{ _trans('certificate.Page Layout') }}
                                            <span class="text-danger"> *</span>
                                        </label>
                                        <select
                                            class="primary_select select_layout form-control{{ $errors->has('layout') ? ' is-invalid' : '' }}"
                                            name="layout" id="layout">
                                            <option data-display=" {{ _trans('certificate.Page Layout') }} *"
                                                value=""> {{ _trans('certificate.Page Layout') }} *
                                            </option>
                                            <option value="1"
                                                {{ isset($certificate) ? ($certificate->layout == 1 ? 'selected' : '') : '' }}>
                                                {{ _trans('certificate.A4 (Portrait)') }} </option>
                                            <option value="2"
                                                {{ isset($certificate) ? ($certificate->layout == 2 ? 'selected' : '') : '' }}>
                                                {{ _trans('certificate.A4 (Landscape)') }} </option>
                                            <option value="3"
                                                {{ isset($certificate) ? ($certificate->layout == 3 ? 'selected' : '') : '' }}>
                                                {{ _trans('certificate.Custom') }} </option>

                                        </select>
                                        @if ($errors->has('layout'))
                                            <span class="text-danger invalid-select" role="alert">
                                                {{ $errors->first('layout') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <label>@lang('admin.height') (mm)<span class="text-danger">*</span></label>
                                            <input class="primary_input_field{{ $errors->has('height') ? ' is-invalid' : '' }} certificate_height" 
                                                type="text" name="height" placeholder="@lang('admin.height')" autocomplete="off" value="{{isset($certificate)? $certificate->height: old('height')}}">
                                           
                                          
                                            @if ($errors->has('height'))
                                            <span class="text-danger" >
                                                {{ $errors->first('height') }}
                                            </span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <label>@lang('admin.width') (mm)<span class="text-danger">*</span></label>
                                            <input class="primary_input_field{{ $errors->has('width') ? ' is-invalid' : '' }} certificate_width"
                                                type="text" name="width" placeholder="@lang('admin.width')" autocomplete="off" value="{{isset($certificate)? $certificate->width: old('width')}}">
                                           
                                          
                                            @if ($errors->has('width'))
                                            <span class="text-danger" >
                                                {{ $errors->first('width') }}
                                            </span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12 d-flex align-items-center">
                                        <p class="text-uppercase fw-500 mb-10">@lang('admin.student_photo')</p>
                                        <div class="d-flex radio-btn-flex ml-40">
                                            <div class="mr-30">
                                                <input type="radio" name="student_photo" id="relationFather" value="1" class="common-radio relationButton" {{isset($certificate)? ($certificate->student_photo == 1? 'checked': ''):'checked'}}>
                                                <label for="relationFather">@lang('common.yes')</label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="student_photo" id="relationMother" value="0" class="common-radio relationButton" {{isset($certificate)? ($certificate->student_photo == 0? 'checked': ''):''}}>
                                                <label for="relationMother">@lang('common.none')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-none">
                                    <div class="row no-gutters input-right-icon mt-25">
                                        <label for="checkbox" class="mb-2">@lang('admin.certificate_no')</label>
                                        <div class="">
                                            <input type="checkbox" id="checkbox" class="common-checkbox">
                                        </div>
                                    
                                    </div>
                                </div>
                                
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <div class="primary_file_uploader">
                                                <input class="primary_input_field" type="text" id="placeholderInput"
                                                placeholder="{{isset($certificate)? ($certificate->file != ""? getFilePath3($certificate->file):trans('common.image') .' *'): trans('common.image') .' (1100 X 850)px *'}}" readonly>
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg" for="browseFile">{{ __('common.browse') }}</label>
                                                    <input type="file" class="d-none" name="file" id="browseFile">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
	                           @php 
                                  $tooltip = "";
                                  if(userPermission("student-certificate-store")){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                @endphp
                                
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="{{$tooltip}}">
                                            <span class="ti-check"></span>
                                            @if(isset($certificate))
                                                @lang('admin.update_certificate')
                                            @else
                                                @lang('admin.save_certificate')
                                            @endif
                                          
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="white-box">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-15">  @lang('admin.certificate_list')</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <x-table>
                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                                <thead>
                                    
                                    <tr>
                                        <th>@lang('common.name')</th>
                                        <th>@lang('admin.background_image')</th>
                                        <th>{{ _trans('common.Default For') }}</th>
                                        <th>@lang('common.actions')</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($certificates as $certificate)
                                    <tr>
                                        <td><a class="text-color" data-toggle="modal" data-target="#showCertificateModal{{ @$certificate->id}}"  href="#">{{ @$certificate->name}}</a></td>
                                        <td>
                                            @if (@$certificate->file)
                                                <img src="{{url(@$certificate->file)}}" width="100">
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="primary-btn small fix-gr-bg text-nowrap">
                                                {{ @$certificate->default_for }}
                                            </button>  
                                        </td>
                                        <td>
                                            <x-drop-down>
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#showCertificateModal{{ @$certificate->id}}"  href="#">@lang('common.view')</a>
                                                    @if(userPermission("student-certificate-edit"))
                                                    <a class="dropdown-item" href="{{route('student-certificate-edit',@$certificate->id)}}">@lang('common.edit')</a>
                                                    @endif
                                                    @if(userPermission("student-certificate-edit") && moduleStatusCheck('Lms'))
                                                        @if(@$certificate->default_for == null)
                                                            <a class="dropdown-item" href="{{route('student-certificate-set-default',[@$certificate->id,'course'])}}">
                                                                {{_trans('lms.Make Default(Course)')}}
                                                            </a>
                                                            <a class="dropdown-item" href="{{route('student-certificate-set-default',[@$certificate->id,'quiz'])}}">
                                                                {{_trans('lms.Make Default(Quiz)')}}
                                                            </a>
                                                        @else
                                                            <a class="dropdown-item" href="{{route('student-certificate-reset-default',@$certificate->id)}}">
                                                                {{_trans('lms.Reset Default')}}
                                                            </a>
                                                        @endif
                                                    @endif
                                                    @if(userPermission("student-certificate-delete"))
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#deleteSectionModal{{ @$certificate->id}}"  href="#">@lang('common.delete')</a>
                                                    @endif
                                            </x-drop-down>
                                        </td>
                                    </tr>
                                    <div class="modal fade admin-query" id="deleteSectionModal{{@$certificate->id}}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">@lang('admin.delete_certificate')</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4>@lang('common.are_you_sure_to_delete')</h4>
                                                    </div>

                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('common.cancel')</button>
                                                        {{ Form::open(['route' => array('student-certificate-delete',@$certificate->id), 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) }}
                                                        <button class="primary-btn fix-gr-bg" type="submit">@lang('common.delete')</button>
                                                        {{ Form::close() }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade admin-query" id="showCertificateModal{{ @$certificate->id}}">
                                        <div class="modal-dialog modal-dialog-centered large-modal">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">@lang('admin.view_certificate')</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="mx-3 my-2 student-certificate">
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-12 text-center">
                                                                <div class="mb-5">
                                                                    <img class="img-fluid" src="{{asset($certificate->file)}}">
                                                                </div>
                                                            </div>

                                                            <div class="text-center certificate-position">
                                                                <div>
                                                                    <div class="row justify-content-lg-between mb-5">
                                                                        <div class="col-md-5">
                                                                            <p class="m-0">{{ @$certificate->header_left_text}}</p>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <p class="m-0">@lang('admin.date'): {{ @$certificate->date }}</p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="certificate-middle">
                                                                        <p>
                                                                            {{  @$certificate->body  }}
                                                                        </p>
                                                                    </div>

                                                                    @if ( @$certificate->body_two )
                                                                    <div class="certificate-middle">
                                                                        <p>
                                                                            {{  @$certificate->body_two  }}
                                                                        </p>
                                                                    </div>
                                                                    @endif

                                                                    <div class="mt-80 mb-4">
                                                                        <div class="row">
                                                                            <div class="col-md-4 text-center">
                                                                                <div class="signature bb-15">{{ @$certificate->footer_left_text }}</div>
                                                                            </div>
                                                                            <div class="col-md-4 text-center">
                                                                                <div class="signature bb-15">{{ @$certificate->footer_center_text }}</div>
                                                                            </div>
                                                                            <div class="col-md-4 text-center">
                                                                                <div class="signature bb-15">{{ @$certificate->footer_right_text }}</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </x-table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@include('backEnd.partials.data_table_js')
@include('backEnd.partials.date_picker_css_js')
@section('script')
    <script>
          $('.select_layout').on('change', function() {
            let layout = $(this).val();
            let height = $('.certificate_height');
            let width = $('.certificate_width');

            if (layout == 1) {
                // Portrait
                height.val('297');
                width.val('210');
                height.attr('readonly', true);
                width.attr('readonly', true);
            } else if (layout == 2) {
                // Landscape
                height.val('210');
                width.val('297');
                height.attr('readonly', true);
                width.attr('readonly', true);
            } else {
                height.val('');
                width.val('');
                height.attr('readonly', false);
                width.attr('readonly', false);
            }
        })
        $('#body_two_part').hide();
        $("#certificate_type").on("change", function () {
            var certificate_type = $("#certificate_type").val();
            if(certificate_type == "arabic"){
                $("#body_two_part").css("display", "block");
            }
            else{
                $("#body_two_part").css("display", "none");
            }
            
        });

        @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
        @endif
    </script>
@endsection