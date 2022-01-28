<div class="itemComments" id="itemCommentsAnchor">
    <div class="section-comment">
        <div id="box_comment_vne" class="box_category width_common" data-component-runtime="js" data-component-function="showComment" data-component-input="{&quot;type&quot;:&quot;comment&quot;,&quot;article_id&quot;:&quot;4405387&quot;,&quot;article_type&quot;:&quot;1&quot;,&quot;site_id&quot;:&quot;1002565&quot;,&quot;category_id&quot;:&quot;1005114&quot;,&quot;sign&quot;:&quot;489b3c84acf4dd85257ea25e96562fcb&quot;,&quot;limit&quot;:24,&quot;tab_active&quot;:&quot;most_like&quot;}">
            <div class="box_comment_vne width_common" style="transform-origin: 0px 0px; opacity: 1; transform: scale(1, 1);">
                <div class="ykien_vne width_common" style="transform-origin: 0px 0px; opacity: 1; transform: scale(1, 1);">
                    <div class="left">
                        <h3 style="display:inline-block;font-weight:bold;" rel="time">Ý kiến</h3> (<label id="total_comment"></label>)
                    </div>
                </div>
                <div class="input_comment width_common">
                    <form id="comment_post_form">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        @if (Auth::guard('account')->check())
                        <input type="hidden" name="user_id" value="{{ Auth::guard('account')->user()->id }}">
                        @else
                        <input type="hidden" name="user_id" value="0">
                        @endif

                        <div class="box-area-input width_common">
                            <textarea id="txtComment" class="txt_comment block_input" placeholder="Ý kiến của bạn" style="overflow-y:hidden;"></textarea>
                        </div>
                        @if (Auth::guard('account')->check())
                        <div class="width_common block_relative" style="display: block;">
                            <div class="left block_not_login block_anonymous"></div>
                            <div class="right block_btn_send">
                                <button type="button" value="Gửi" class="btn_send_comment btn_vne" id="comment_post_button" data-parent="0" data-content="#txtComment">Gửi</button>
                            </div>
                            <div class="like_google" style="transform-origin: 0px 0px; opacity: 1; transform: scale(1, 1); display: block;">
                                <div class="google_name">
                                    <a class="avata_coment" href="#" target="_blank">
                                        <img src="{{ Avatar::create(Auth::guard('account')->user()->name)->setForeground('#DDDDDD')->toBase64() }}" alt="{{Auth::guard('account')->user()->name}}"></a>
                                    <span>{{ Auth::guard('account')->user()->name }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <span class="error_lk error_txt_cmt" style="display: none;">Bạn chưa nhập nội dung bình
                            luận.</span>
                    </form>
                    <div id="comment_reply_wrapper" class="input_comment reply_input_comment width_common" style="display: none;">
                        <form id="comment_reply_form">
                            <div class="box-area-input width_common">
                                <textarea id="txtComments" class="txt_comment block_input" placeholder="Ý kiến của bạn" style="overflow-y:hidden;"></textarea>
                            </div>
                            <span class="error_lk error_txt_cmt" style="display: none;">Bạn chưa nhập nội dung bình luận.</span>
                            @if (Auth::guard('account')->check())
                            <div class="width_common block_relative" style="display: block;">
                                <div class="left block_not_login block_anonymous"></div>
                                <div class="right"><button type="button" value="Gửi" class="btn_send_comment btn_vne" id="comment_reply_button" data-parent='0' data-content="#txtComments">Gửi</button></div>
                                <div class="like_google" style="transform-origin: 0px 0px; opacity: 1; transform: scale(1, 1); display: block;">
                                    <div class="google_name">
                                        <a class="avata_coment" href="#" target="_blank">
                                            <img src="{{ Avatar::create(Auth::guard('account')->user()->name)->setForeground('#DDDDDD')->toBase64() }}" alt="{{ Auth::guard('account')->user()->name }}"></a>
                                        <span>{{ Auth::guard('account')->user()->name }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="filter_coment width_common"><a href="javascript:;" class="active" rel="like">Quan tâm nhất</a><a href="javascript:;" class="" rel="time">Mới nhất</a></div>
                <div class="loading" style="text-align: center; padding-top: 15px; width: 100%; float: left; display: none;"><img class="img_comment_loading" src="https://s1.vnecdn.net/vnexpress/restruct/c/v977/images/graphics/loading1.gif" style="width:25px;" title="Đang tải dữ liệu" alt="Đang tải dữ liệu"></div>
                <div class="view_all_reply_loading"></div>
                <div class="width_common" id="box_comment"></div>
                <div class="view_more_coment width_common mb10" style="transform-origin: 0px 0px; opacity: 1; transform: scale(1, 1); display:none">
                    <a href="javascript:;" class="txt_666">Xem thêm</a></div>
                <div id="cmt-paginator" class="width_common mt20">
                    <p id="pagination" class="pagination mb10"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="{{ asset('theme/assets/css/comment_v4.css') }}" rel="stylesheet" type="text/css" />

@push("scripts")

<script type="text/javascript">
    jQuery(document).ready(function() {
        /*Load data*/

        let currentPage = 1;
        let ready = true
        let totalPage

        function loadItem(page,sort) {
            if (!page) {
                page = 1
            }
            if (ready == true) {
                ready = false
                jQuery.ajax({
                    url: "{{route('fe.review.index')}}", 
                    data: {
                        "post_id": jQuery('input[name=post_id]').val(),
                        sort:sort,
                        page:page
                    }, 
                    success: function(result) {
                        jQuery('#box_comment').append(result.view);
                        jQuery('#total_comment').html(result.totalComment);
                        ready = true;
                        totalPage = result.totalPage;
                    },
                    complete: function () { 
                        if (totalPage == currentPage) {
                            jQuery('.view_more_coment').hide();
                        } else {
                            jQuery('.view_more_coment').removeAttr('disabled').html('<a href="javascript:;" class="txt_666">Xem thêm</a>').show();
                        }
                    }
                });
            }
        };
        /* Khởi tạo ban đầu */
        loadItem(1,'like');
        /* Xem thêm */
        jQuery(document).on('click', '.view_more_coment', function (e) {
            e.preventDefault()
            jQuery(this).attr('disabled', 'disabled').html('<a href="javascript:;" class="txt_666">Đang tải ...</a>');
            currentPage++;
            var sort = jQuery('.filter_coment.width_common active').attr('rel');
            loadItem(currentPage,sort);
        });
       /*Tab */
        jQuery(document).on('click', '.filter_coment.width_common a', function (e) {
            e.preventDefault();
            var k = jQuery('#comment_reply_wrapper:last');
            var b = jQuery('.input_comment.width_common');
            k.hide().appendTo(b);
            jQuery('#box_comment').html('');
            currentPage=1;
            jQuery('.filter_coment.width_common a').removeClass('active');
            jQuery(this).addClass('active');
            
            var sort = jQuery(this).attr('rel');
            loadItem(currentPage,sort);
        });

        /*view_all_reply*/

        jQuery(document).on('click', '.view_all_reply', function (e) {  
                var thisMain = jQuery(this);
                jQuery.ajax({
                    url: "{{route('fe.review.reply')}}", 
                    data: {
                        "parent_id": jQuery(this).attr('rel')
                    }, 
                    success: function(result) {
                        thisMain.hide(); 
                        thisMain.closest('.comment_item').find('.sub_comment').append(result.view);
                    },
                    complete: function () { 
                       
                    }
                });
        });

        /* Like */

        jQuery(document).on('click', '.link_thich', function (e) {  
                var useriId = jQuery('input[name=user_id]').val();
                if (useriId == 0) {
                    jQuery(".login-switch").trigger("click");
                    return;
                }
                var thisMain = jQuery(this);
                jQuery.ajax({
                    type:'POST',
                    url: "{{route('fe.review.like')}}", 
                    data: {
                        "model_id": thisMain.attr('id')
                    }, 
                    success: function(result) {
                        jQuery(thisMain).find(".total_like").text(result.total_like);
                    },
                    complete: function () { 
                       
                    }
                });
        });


        jQuery(document).on('click', '#comment_post_button,#comment_reply_button', function (e) {        
            var useriId = jQuery('input[name=user_id]').val();
            if (useriId == 0) {
                jQuery(".login-switch").trigger("click");
                return;
            }
            var content = jQuery(this).attr('data-content');
            var parentId = jQuery(content).attr('data-parent');
            jQuery.ajax({
                type: 'post'
                , url: "{{route('fe.review.store')}}"
                , data: {
                    "post_id": jQuery('input[name=post_id]').val(), 
                    "body": jQuery(content).val(),
                    "parent_id": parentId
                , }
                , success: function(result) {

                    jQuery(content).val('');
                    var a = 'Gửi ý kiến thành công ';
                    var b = 'Ý sẽ được kiểm duyệt, hệ thống sẽ tự động đóng trong 30s';
                    jQuery.magnificPopup.open({
                            items: { src: '<div class="white-popup width-medium"><div class="inner-popup"><div class="title-popup">' + b + '</div><div class="content-popup">' + a + "</div></div></div>" },
                            mainClass: "mfp-with-zoom lightbox_for_comment",
                            type: "inline",
                            midClick: !0,
                            fixedContentPos: !1,
                            fixedBgPos: !0,
                            overflowY: "auto",
                            closeBtnInside: !0,
                            preloader: !1,
                            removalDelay: 300
                        });

                }
            });
        });

       

        jQuery(document).on("click", "a.link_reply", function() {
            var useriId = jQuery('input[name=user_id]').val();
            if (useriId == 0) {
                jQuery(".login-switch").trigger("click");
            }      
            var k = jQuery('#comment_reply_wrapper:last');
            var b = jQuery(this).closest('.comment_item').find('.sub_comment');
            k.show().prependTo(b);
            jQuery('#comment_reply_button').attr('data-parent',jQuery(this).attr('id'));
        });


        /* Đăng nhập */
        jQuery(document).on("click", "#txtComment,#txtComments", function() {    
            var useriId = jQuery('input[name=user_id]').val();
            if (useriId == 0) {
                jQuery(".login-switch").trigger("click");
            }
        });


    });

</script>
@endpush
