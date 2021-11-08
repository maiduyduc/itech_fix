@extends('layouts.dashboard.dashboard')

@section('title')
    <title>Sửa khóa học</title>
@endsection

@section('content')
    <div class="col-md-12 p-4">
        @include('partials.dashboard.course-header', ['name' => 'Trang chủ','name_page' =>'Danh sách khóa học' ,'key' => 'Sửa Khóa học'])
    </div>
    <div class="pb-12">
        <div class="container">
            <div id="courseForm" class="bs-stepper">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                        <div class="bs-stepper-header shadow-sm" role="tablist">
                            <div class="step" data-target="#test-l-1">
                                <button type="button" class="step-trigger" role="tab" id="courseFormtrigger1"
                                        aria-controls="test-l-1">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Thông tin cơ bản</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#test-l-2">
                                <button type="button" class="step-trigger" role="tab" id="courseFormtrigger2"
                                        aria-controls="test-l-2">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Hình ảnh</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#test-l-3">
                                <button type="button" class="step-trigger" role="tab" id="courseFormtrigger3"
                                        aria-controls="test-l-3">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Chương trình học</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content mt-5">
                            <form method="post" enctype="multipart/form-data"
                                  action="{{ route('courses-admin.update', ['id' => $course->id]) }}"
                            >
                                @csrf
                                <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade"
                                     aria-labelledby="courseFormtrigger1">
                                    <div class="card mb-3 ">
                                        <div class="card-header border-bottom px-4 py-3">
                                            <h4 class="mb-0">Thông tin cơ bản</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="courseTitle" class="form-label">Tên khóa học</label>
                                                <input id="courseTitle" class="form-control" type="text"
                                                       name="course_name" required
                                                       value="{{ $course->name }}"
                                                       placeholder="Nhập tên khóa học"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Danh mục khóa học</label>
                                                <select class="form-control" name="category_id">
                                                    <option value="0" style="font-weight: bold;">Chọn danh mục</option>
                                                    {!! $htmlOption !!}
                                                </select>
                                                <small>Giúp mọi người tìm kiếm khóa học dễ dàng hơn bằng cách chọn đúng
                                                    danh mục.</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Mô tả khóa học</label>
                                                <textarea id="course_content" class="ckeditor" cols="30" rows="10"
                                                          name="course_content">{{ $course->content }}</textarea>
                                                <small>Mô tả tóm tắt về nội dung khóa học.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-primary" onclick="courseForm.next()">
                                        Tiếp tục
                                    </a>
                                </div>
                                <div id="test-l-2" role="tabpanel" class="bs-stepper-pane fade"
                                     aria-labelledby="courseFormtrigger2">
                                    <div class="card mb-3  border-0">
                                        <div class="card-header border-bottom px-4 py-3">
                                            <h4 class="mb-0">Hình ảnh</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="custom-file-container" data-upload-id="courseCoverImg"
                                                 id="courseCoverImg">
                                                <label class="form-label">Chọn ảnh đại diện cho khóa học
                                                    <a href="javascript:void(0)"
                                                       class="custom-file-container__image-clear"
                                                       title="Clear Image"></a></label>
                                                <label class="custom-file-container__custom-file">
                                                    <input type="file"
                                                           value="{{ $course->image_path }}"
                                                           name="image_path"
                                                           id="imgInp"
                                                           class="custom-file-container__custom-file__custom-file-input"
                                                           accept="image/*"/>
                                                    <input placeholder="" type="hidden" name="MAX_FILE_SIZE"
                                                           value="10485760"/>
                                                    <span
                                                        class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <img class="custom-file-container__image-preview" id="blah"
                                                     src="{{ $course->image_path }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-secondary" onclick="courseForm.previous()">
                                            Về trang trước
                                        </a>
                                        <a class="btn btn-primary" onclick="courseForm.next()">
                                            Tiếp tục
                                        </a>
                                    </div>
                                </div>
                                <div id="test-l-3" role="tabpanel" class="bs-stepper-pane fade"
                                     aria-labelledby="courseFormtrigger3">
                                    <div class="card mb-3  border-0">
                                        <div class="card-header border-bottom px-4 py-3">
                                            <h4 class="mb-0">Chương trình học</h4>
                                        </div>
                                        <div class="card-body ">
                                            <div class="bg-light rounded p-2 mb-4">
                                                <h4>Tạo các bài học tại đây.</h4>
                                                <div class="list-group list-group-flush border-top-0" id="courseList">
                                                    @foreach($course->courseLectures as $lec)
                                                        <div id="lec{{ $lec->id }}"
                                                             class="list-group-item rounded px-3 mb-1">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between">
                                                                <h5 class="mb-0"><a href="#!" class="text-inherit"> <i
                                                                            class="fe fe-menu mr-1 text-muted align-middle"></i>
                                                                        <span
                                                                            class="align-middle">{{ $lec->name }}</span>
                                                                    </a>
                                                                </h5>
                                                                <div><a href="#!" class="mr-1 text-inherit"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        onclick="delLecture({{ $lec->id }})"
                                                                        title="Delete"><i
                                                                            class="fe fe-trash-2 font-size-xs"></i></a>
                                                                    <a
                                                                        href="#!" class="text-inherit"
                                                                        aria-expanded="true"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapselist{{ $lec->id }}"
                                                                        aria-controls="collapselistOne"> <span
                                                                            class="chevron-arrow"><i
                                                                                class="fe fe-chevron-down"></i></span></a>
                                                                </div>
                                                            </div>
                                                            <div id="collapselist{{ $lec->id }}" class="collapse show"
                                                                 data-parent="#courseList">
                                                                <div class="card-body"><input class="form-control mb-2"
                                                                                              required=""
                                                                                              value="{{ $lec->name }}"
                                                                                              name="lectureName[]"
                                                                                              type="text"
                                                                                              placeholder="Tiêu đề bài học">
                                                                    <input class="form-control mb-2" required=""
                                                                           name="lectureLink[]"
                                                                           value="{{ $lec->lecture_link }}"
                                                                           type="text"
                                                                           placeholder="Link video"></div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a href="#!"
                                                   class="btn btn-outline-primary btn-sm mt-3"
                                                   onclick="appendText()"
                                                >Thêm bài học +</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-secondary" onclick="courseForm.previous()">
                                            Về trang trước
                                        </a>
                                        <button class="btn btn-danger" type="submit">
                                            Hoàn thành
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="addLectureModal" tabindex="-1" role="dialog" aria-labelledby="addLectureModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLectureModalLabel">
                        Thêm bài học
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input class="form-control mb-2" id="title1" type="text" placeholder="Nhập tên bài học"/>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="addLecture1" onclick="appendText()" data-dismiss="modal"
                            type="Button">
                        Thêm
                    </button>
                    <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                        Hủy
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
    <script>
        //them bai hoc
        let count = 999;

        function appendText() {
            // let title = "Bài " + count;
            let title = "";
            let element = "<div id='lec" + count + "' class='list-group-item rounded px-3 mb-1'>" +
                "<div class='d-flex align-items-center justify-content-between'> " +
                "<h5 class='mb-0'> " +
                "<a href='#!' class='text-inherit'> " +
                "<i class='fe fe-menu mr-1 text-muted align-middle'></i> " +
                "<span class='align-middle'>" + title + "</span> " +
                "</a>" +
                "</h5>" +
                "<div> " +
                "<a href='#!' class='mr-1 text-inherit' data-toggle='tooltip' data-placement='top' onclick='delLecture(" + count + ")' title='Delete'>" +
                "<i class='fe fe-trash-2 font-size-xs'></i>" +
                "</a> " +
                "<a href='#!' class='text-inherit' aria-expanded='true' data-toggle='collapse' data-target='#collapselist" + count + "' aria-controls='collapselistOne'> " +
                "<span class='chevron-arrow'>" +
                "<i class='fe fe-chevron-down'></i>" +
                "</span>" +
                "</a>" +
                "</div>" +
                "</div>" +
                "<div id='collapselist" + count + "' class='collapse show' data-parent='#courseList'> " +
                "<div class='card-body'> " +
                "<input class='form-control mb-2' required name='lectureName[]' type='text' placeholder='Tiêu đề bài học'/> " +
                "<input class='form-control mb-2' required name='lectureLink[]' type='text' placeholder='Link video'/> " +
                "</div> " +
                "</div>" +
                "</div>";
            $("#courseList").append(element);   // Append new elements
            count += 1;
        }

        //xoa bai hoc
        function delLecture(x) {
            let lectureId = 'lec' + x.toString();
            let elementId = document.getElementById(lectureId);
            elementId.remove();
        }
    </script>
    <script>
        let options = {
            filebrowserImageBrowseUrl: '/filemanager?type=Images',
            filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/filemanager?type=Files',
            filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('course-content', options);
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
@endsection

