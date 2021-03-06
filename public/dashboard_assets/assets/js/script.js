/*var width = $(window).width(), height = $(window).height();
alert('width : ' +width + 'height : ' + height);*/

$(document).ready(function(){

    $(document.body).on("click",".client-link",function(e){
        e.preventDefault()
        $(".selected .tab-pane").removeClass('active');
        $($(this).attr('href')).addClass("active");
    });

    /* EDIT MODAL POPUP  */

    $('.edit_button').on('click', function(){
        var id = $(this).attr('data-id');
        //alert(id);
        $.ajax(
        {
            url:'/client_portal/edit',
            type: 'GET',
            dataType:'json',
            data:{id: id},
            success: function(response){
                //alert(response['title']);
                $('#id').val(response['id']);
                $('#edit_name').val(response['title']);
                $('#edit_email').val(response['email']);
                $('#edit_phone').val(response['phone']);
                $('#edit_website').val(response['website']);
                $('#edit_businessType').val(response['business_type']);
                $('#edit_area').val(response['area_id']);
                $('#edit_status').val(response['status']);
                $('.edit_description').html(response['description']);
                $('#edit-modal').modal();

            }
        }
      );
    });

    /* #Edit Client Modal Form Submission  */ 

    $('#modal_submit_edit').click(function(e){
      e.preventDefault();
      var btn = $(this);
      $(btn).button('loading');
      var value = $("#edit_client_form").serialize();
      //console.log(value);
      $.ajax({
        url:"/client_portal/update",
        type:"post",
        data:value,
        dataType:"json",
        success: function( response ) {
            $( "#pnotify-success" ).trigger( "click" );
            $('#client_form')[0].reset();
            $( "#edit-modal" ).modal( "hide" );
            window.location = '/';
       },
       error: function(xhr, status, error) {
          $( "#pnotify-danger" ).trigger( "click" );
       },
      });
    });


    /* SWEET ALERT FOR CONFIRMATION (CANCEL OR YES)  */

    // $('.alert-confirm').on('click', function(){
    //     var id = $(this).attr('data-id');
    //     alert(id);
    //     swal({
    //                 title: "Are you sure?",
    //                 text: "You want to update this record!",
    //                 type: "warning",
    //                 showCancelButton: true,
    //                 confirmButtonClass: "btn-danger",
    //                 confirmButtonText: "Yes, update it!",
    //                 closeOnConfirm: false
    //             },
    //             function(){

    //                 $.ajax(
    //                     {
    //                         url: "client_portal/admin/preferences/delete_businesstype",
    //                         type: "get",
    //                         data: {id:id},
    //                         success: function(data){
    //                             swal("Updated!", "The record has been updated.", "success");
    //                             window.location = '/';
    //                         },
    //                         error: function(data){
    //                             swal("Error", "Some Error Occured!", "error")
    //                         }
    //                     }
    //                 )
    //             });
    });
    
    /* SWEET ALERT FOR CONFIRMATION (CANCEL OR YES)  */

    $('.alert-success-cancel-bt').on('click',function(){
            var id = $(this).attr('data-id');
            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax(
                        {
                            url: "/client_portal/admin/preferences/delete_businesstype",
                            type: "get",
                            dataType: 'json',
                            data: {id: id},
                            //headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            success: function(data){
                                swal("Deleted!", "The Business Type has been deleted.", "success");
                                window.location = '/client_portal/admin/preferences/businesstype';
                            },
                            error: function(data){
                                swal("Error", "Some Error Occured!", "error")
                            }
                        }
                    )
                    } else {
                        swal("Cancelled", "The record is safe :)", "error");
                    }
                });
    });

    /* SWEET ALERT FOR CONFIRMATION (CANCEL OR YES)  */

    $('.alert-success-cancel-area').on('click',function(){
            var id = $(this).attr('data-id');
            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {

                        $.ajax(
                        {
                            url: "/client_portal/admin/preferences/delete_area",
                            type: "get",
                            dataType: 'json',
                            data: {id: id},

                            success: function(data){
                                swal("Deleted!", "The area has been deleted.", "success");
                                window.location = '/client_portal/admin/preferences/areas';
                            },
                            error: function(data){
                                swal("Error", "Some Error Occured!", "error")
                            }
                        }
                    )
                    } else {
                        swal("Cancelled", "The record is safe :)", "error");
                    }
                });
    });

    /* SWEET ALERT FOR CONFIRMATION (CANCEL OR YES)  */

    $('.alert-success-cancel-status').on('click',function(){
            var id = $(this).attr('data-id');
            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax(
                        {
                            url: "/client_portal/admin/preferences/delete_status",
                            type: "get",
                            dataType: 'json',
                            data: {id:id},
                            success: function(data){
                                swal("Deleted!", "The record has been deleted.", "success");
                                window.location = '/client_portal/admin/preferences/status';
                            },
                            error: function(data){
                                swal("Error", "Some Error Occured!", "error")
                            }
                        }
                    )
                    } else {
                        swal("Cancelled", "The record is safe :)", "error");
                    }
                });
    });


    /* SWEET ALERT FOR CLIENT DELETION REQUEST WITH REASON  FROM AGENT  */

    $('.alert-prompt').on('click', function(){
        var id = $(this).attr('data-id');
        //alert(id);

        swal({
            title: "WHY!",
            text: "REASON:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            inputPlaceholder: "Please explain the reason"
        }, function (inputValue) {
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("You need to give the reason!");
                return false
            } else{
                $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });
                $.ajax(
                        {
                            url: "/client_portal/preferences/client/delete_request",
                            type: "post",
                            dataType: 'json',
                            data: {id:id, reason:inputValue},
                            success: function(data){
                                swal("Done!", "Your request has been forwaded to Admin for approval.", "success");
                                window.location = '/';
                            },
                            error: function(data){
                                swal("Error", "Some Error Occured!", "error")
                            }
                        }
                    )
            }
        });
    });

    /* Confirmation for Approving Deletion of Client */
    $('.alert-confirm-deletion').on('click', function(){
        var id = $(this).attr('data-id');
        //alert(id);
        swal({
                    title: "Are you sure?",
                    text: "You want to approve delete request!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, approve it!",
                    closeOnConfirm: false
                },
                function(){

                    $.ajax(
                        {
                            url: "/client_portal/admin/preferences/approve_request/client",
                            type: "get",
                            data: {id:id},
                            success: function(response){
                                swal("Deleted!", "The Client Delete Request has been approved.", "success");
                                window.location.reload(true);
                            },
                            error: function(response){
                                swal("Error", "Some Error Occured!", "error")
                            }
                        }
                    )
                });
    });

    /* Decline for Approving Deletion of Client */
    $('.alert-decline-deletion').on('click', function(){
        var id = $(this).attr('data-id');
        //alert(id);
        swal({
                    title: "Are you sure?",
                    text: "You want to decline delete request!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, decline it!",
                    closeOnConfirm: false
                },
                function(){

                    $.ajax(
                        {
                            url: "/client_portal/admin/preferences/decline_request/client",
                            type: "get",
                            data: {id:id},
                            success: function(response){
                                swal("Declined!", "The Client Delete Request has been Deeclined.", "success");
                                window.location.reload(true);
                            },
                            error: function(response){
                                swal("Error", "Some Error Occured!", "error")
                            }
                        }
                    )
                });
    });


    /*  CONFIRMATION FOR DELETION FROM ADMIN */

    $('.alert-confirm-admin').on('click', function(){
        var id = $(this).attr('data-id');
        //alert(id);
        swal({
                    title: "Are you sure?",
                    text: "You want to delete this client!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function(){

                    $.ajax(
                        {
                            url: "/client_portal/admin/preferences/deleteClient",
                            type: "get",
                            data: {id:id},
                            success: function(data){
                                swal("Deleted!", "The record has been Deleted.", "success");
                                window.location.reload(true);
                            },
                            error: function(data){
                                swal("Error", "Some Error Occured!", "error");
                            }
                        });
                    
                });
    });
    

    
    /* Client Details through AJAX and Assigning values to MODAL POPUP  */

    $('.client_details_button').on('click', function(){
        var id = $(this).attr('data-id');
        //alert(id);
        $.ajax(
        {
            url:'/client_portal/getClientDetails',
            type: 'GET',
            dataType:'json',
            data:{id: id},
            success: function(response){
                //alert(response);
                $('#client_name').text(response['title']);
                $('#client_email').text(response['email']);
                $('#client_phone').text(response['phone']);
                $('#client_website').text(response['website']);
                $('#client_businessType').text(response['businesstype']['name']);
                $('#client_area').text(response['area']['name']);
                $('#client_status').text(response['status']['name']);
                $('.client_description').html(response['description']);
                $('#details-modal').modal();

            }
        }
      );
    });




$(document).ready(function() {
    var select = document.getElementById('task_project');
    function logValue() {
        var project = $('#task_project').val();
        var start = $(this).find(':selected').attr('data-start');
        var deadline = $(this).find(':selected').attr('data-deadline');
        $('.start_date').attr('min', start);
        $('.start_date').attr('max', deadline);

        $('.deadline').attr('min', start);
        $('.deadline').attr('max', deadline);
    }

    if (select != null) {
        select.addEventListener('change', logValue, false);
    }
} );


$(document).ready(function() { 
    
    $('#select').click(function(){
        $('#option').html('');
    });

    $('#project_edit_client').click(function(){
        $('#project_client_option').html('');
    });

     $('#project_edit_recruiter').click(function(){
        $('#project_recruiter_option').html('');
    });

    // $('#total_price').keyup(function(){
    //     var total_price = $('#total_price').val();
    //     var commission = $('#commission').val()/100*total_price;

    //     var actual_price = total_price - commission;

    //     $('#comissioned_price').val(actual_price);

    // });

    // $('#commission').keyup(function(){
    //     var total_price = $('#total_price').val();
    //     var commission = $('#commission').val()/100*total_price;

    //     var actual_price = total_price - commission;

    //     $('#comissioned_price').val(actual_price);

    // });


    //var $window = $(window);
    
    //add id to main menu for mobile menu start  
    //var getBody = $("body");
    //var bodyClass = getBody[0].className;
    //$(".main-menu").attr('id', bodyClass);
    //add id to main menu for mobile menu end

    //loader start
    $('.theme-loader').fadeOut(1000);
    //loader end

    //setMenu();
    //MenuLayout();
    //setMenuLayout();

    // $(window).on('resize', function() {
    //     setMenu();
    //     setMenuLayout();

    // });

    //mobile menu start
    function setMenu() {
        var a = $(window).height() - 140;
        $('.main-menu-content').css('min-height', a);
        if (Modernizr.cssscrollbar) {
            $(".main-menu-content").slimScroll({
                height: a,
                allowPageScroll: true,
                wheelStep: 5,
                color: '#fff',
                animate: true
            });
        }
        var mainMenuID = $(".main-menu").attr('id');
        if ($window.width() < 768) {
            $("body").removeClass().addClass("header-fixed");
        } else if ($window.width() > 768 && $window.width() < 992) {
            $("body").removeClass().addClass("menu-compact").addClass("menu-expanded");
            var c = $window.height();
            $(".main-menu-content").slimScroll({ destroy: true });
            $(".main-menu-content").css('height', '100%');
            $(".main-menu").css('min-height', c);
            $("body").addClass("menu-static");
        } else if ($window.width() > 992) {
            $("body").removeClass().addClass(mainMenuID);
            if ($("body").hasClass("header-fixed")) {
                $("body").addClass("menu-hide");
            } else if ($("body").hasClass("box-layout")) {
                $("body").addClass("container");
            } else if ($("body").hasClass("menu-compact")) {
                var c = $window.height();
                $(".main-menu-content").slimScroll({ destroy: true });
                $(".main-menu-content").css('height', '100%');
                $(".main-menu").css('min-height', c);
                $("body").addClass("menu-static");
            } else {

                $("body").addClass("menu-expanded");
            }
        }
    };
    //mobile menu end


    //menu scrolling end
    //box layout & overlay & menu-sidebar menu start

    function MenuLayout() {
        if ($("body").hasClass("box-layout")) {
            $("body").addClass("container");
        } else if ($("body").hasClass("header-fixed")) {
            $("body").addClass("menu-hide");
        } else if ($("body").hasClass("menu-sidebar")) {
            $(window).on('scroll', function() {
                var scrollWindow = $(window).scrollTop();
                if (scrollWindow == 0) {
                    $(".main-menu").css('top', '');
                } else {
                    if ($("body").hasClass("menu-collapsed")) {
                        return;
                    } else {
                        $(".main-menu").css('top', '-10px');
                        var a = $(window).height() - 70;
                        $('.main-menu-content').css('min-height', a);
                        if (Modernizr.cssscrollbar) {
                            $(".main-menu-content").slimScroll({
                                height: a,
                                allowPageScroll: true,
                                wheelStep: 5,
                                color: '#fff',
                                animate: true
                            });
                        }
                    }
                }
            });
        } else if ($("body").hasClass("menu-static")) {
            $(window).on('scroll', function() {
                var scrollWindow = $(window).scrollTop();
                if (scrollWindow == 0) {
                    if ($("body").hasClass("menu-collapsed")) {
                        return;
                    } else {
                        var a = $(window).height() - 140;
                        $('.main-menu-content').css('min-height', a);
                        if (Modernizr.cssscrollbar) {
                            $(".main-menu-content").slimScroll({
                                height: a,
                                allowPageScroll: true,
                                wheelStep: 5,
                                color: '#fff',
                                animate: true
                            });
                        }
                    }


                } else {
                    $(".main-menu-content").slimScroll({ destroy: true });
                    $(".main-menu-content").css('height', '');
                }
            });
        } else if ($("body").hasClass("horizontal-icon-fixed")) {
            $(window).on('scroll', function() {
                var scrollWindow = $(window).scrollTop();
                if (scrollWindow == 0) {
                    $(".main-menu").css('top', '56px');
                } else {
                    $(".main-menu").css('top', 0);
                }
            });
        }
    }
    //box layout & overlay & menu-sidebar menu end

    //menu scrolling start
    function setMenuLayout() {
        if ($("body").hasClass("menu-bottom")) {
            var a = $(window).height() - 142;
            $('.main-menu-content').css('min-height', a);
            if (Modernizr.cssscrollbar) {
                $(".main-menu-content").slimScroll({
                    height: a,
                    allowPageScroll: true,
                    wheelStep: 5,
                    animate: true,
                    color: '#fff'
                });
            }
        } else if ($("body").hasClass("horizontal-fixed") || $("body").hasClass("horizontal-static") || $("body").hasClass("horizontal-icon") || $("body").hasClass("horizontal-icon-fixed") || $("body").hasClass("menu-compact")) {
            $(".main-menu-content").slimScroll({ destroy: true });
            $('.main-menu-content').css('min-height', '');
            $('.main-menu-content').css('height', '');
            $('.main-menu-content').css('overflow', '');
        } else if ($("body").hasClass("header-fixed") && $window.width() < 768) {
            $(".main-menu-content").slimScroll({ destroy: true });
            $(".main-menu-content").css('height', '');
            $('.main-menu-content').css('min-height', '');
            $(".main-menu").css('position', 'absolute');
        } else {
            var a = $(window).height() - 140;
            $('.main-menu-content').css('min-height', a);
            if (Modernizr.cssscrollbar) {
                $(".main-menu-content").slimScroll({
                    height: a,
                    allowPageScroll: true,
                    wheelStep: 5,
                    color: '#fff',
                    animate: true
                });
            }
        }
    };


    // card js start
    var emailbody = $(window).height();
    $('.user-body').css('min-height', emailbody);
    $(".card-header-right .icofont-close-circled").on('click', function() {
        var $this = $(this);
        $this.parents('.card').animate({
            'opacity': '0',
            '-webkit-transform': 'scale3d(.3, .3, .3)',
            'transform': 'scale3d(.3, .3, .3)'
        });

        setTimeout(function() {
            $this.parents('.card').remove();
        }, 800);
    });

    $(".card-header-right .icofont-rounded-down").on('click', function() {
        var $this = $(this);
        var port = $($this.parents('.card'));
        var card = $(port).children('.card-block').slideToggle();
        $(this).toggleClass("icon-up").fadeIn('slow');
    });
    $(".icofont-refresh").on('mouseenter mouseleave', function() {
        $(this).toggleClass("rotate-refresh").fadeIn('slow');
    });
    $("#more-details").on('click', function() {
        $(".more-details").slideToggle(500);
    });
    $(".mobile-options").on('click', function() {
        $(".navbar-container .nav-right").slideToggle('slow');
    });

    $('.dropdown-toggle').hover(function () {
    $('.show-notification').stop(true).slideDown(500);
  }, function () {
    $('.show-notification').stop(true).slideUp(500);
  });
    // card js end

    // Menu layout js start    

    // sidebar collapse js start
    $("#collapse-menu").on('click', function() {
        collapseMenu();
    });
    $("#mobile-collapse").on('click', function() {
        $(".main-menu-content").slimScroll({ destroy: true });
        $(".main-menu-content").css('height', '');
        $('.main-menu-content').css('min-height', '');
        $(".main-menu").css('position', 'absolute');
        collapseMenu();

    });

    function collapseMenu() {
        if ($("body").hasClass("menu-hide")) {
            $("body").removeClass("menu-hide");
            $("body").addClass("menu-show");
        } else if ($("body").hasClass("menu-show")) {
            $("body").removeClass("menu-show");
            $("body").addClass("menu-hide");
        } else if ($("body").hasClass("menu-expanded")) {
            $(".main-menu-content").slimScroll({ destroy: true });
            $(".main-menu-content").css('height', '100%');
            $("body").removeClass("menu-expanded");
            $("body").addClass("menu-collapsed").addClass("menu-static");
        } else if ($("body").hasClass("menu-collapsed")) {
            $("body").addClass("menu-expanded");
            $("body").removeClass("menu-collapsed").removeClass("menu-static");
            var a = $(window).height() - 140;
            $('.main-menu-content').css('min-height', a);
            if (Modernizr.cssscrollbar) {
                $(".main-menu-content").slimScroll({
                    height: a,
                    allowPageScroll: true,
                    wheelStep: 5,
                    color: '#fff',
                    animate: true
                });
            }
        }

    };
    // sidebar collapse js end    

    //menu collapse start

    if ($(".main-navigation .nav-item").hasClass("has-class")) {
        $(".tree-1").addClass("open");
    }
    if ($(".nav-sub-item").hasClass("has-class")) {
        $(".tree-2").addClass("open");
    }
    //main li click 
    $(".main-navigation .nav-item").on('click', function() {
        if ($("body").hasClass("horizontal-fixed") || $("body").hasClass("horizontal-static") || $("body").hasClass("horizontal-icon") || $("body").hasClass("horizontal-icon-fixed") || $("body").hasClass("menu-collapsed")) {
            return;
        } else {
            if ($(this).hasClass("has-class") && $(this).children(".tree-1").hasClass("open")) {
                $(this).children("ul").slideToggle();
                $(".tree-1").removeClass("open");
                $(this).children("ul").removeClass("open");
                $(this).removeClass("has-class");
            } else {
                $(".nav-item ul").css('display', 'none');
                $(this).children("ul").slideToggle();
                $(".tree-1").removeClass("open");
                $(".main-navigation .nav-item").removeClass("open").removeClass("has-class");
                $(this).addClass("has-class");
                $(this).children("ul").addClass("open");
            }
        }

    });

    //sub li click (tree-2)
    $(".nav-sub-item").on('click', function(e) {
        e.stopPropagation();
        if ($("body").hasClass("horizontal-fixed") || $("body").hasClass("horizontal-static") || $("body").hasClass("horizontal-icon") || $("body").hasClass("horizontal-icon-fixed") || $("body").hasClass("menu-collapsed")) {
            return;
        } else {
            if ($(this).hasClass("has-class") && $(this).children('.tree-2').hasClass("open")) {
                $(this).children("ul").slideToggle();
                $(this).children('.tree-2').removeClass("open");
                $(this).removeClass("has-class");
                $(this).children("a").children("i.icon-arrow-down").toggleClass("icon-up");
            } else {
                $(".nav-sub-item ul").css('display', 'none');
                $(this).children("ul").slideToggle();
                $(".nav-sub-item").removeClass("open").removeClass("has-class");
                $(this).addClass("has-class");
                $(this).children('.tree-2').addClass("open");
                $(this).children("a").children("i.icon-arrow-down").toggleClass("icon-up");
            }
        }
    });
    //sub li click (tree-3)
    $(".tree-2 .nav-sub-item-3").on('click', function(e) {
        e.stopPropagation();
        if ($("body").hasClass("horizontal-fixed") || $("body").hasClass("horizontal-static") || $("body").hasClass("horizontal-icon") || $("body").hasClass("horizontal-icon-fixed") || $("body").hasClass("menu-collapsed")) {
            return;
        } else {
            if ($(this).hasClass("has-class") && $(this).children('.tree-3').hasClass("open")) {
                $(this).children("ul").slideToggle();
                $(this).children('.tree-3').removeClass("open");
                $(this).removeClass("has-class");
                $(this).children("a").children("i.icon-arrow-down").toggleClass("icon-up");
            } else {
                $(".tree-2 .nav-sub-item-3 ul").css('display', 'none');
                $(this).children("ul").slideToggle();
                $(".tree-2 .nav-sub-item-3").removeClass("open").removeClass("has-class");
                $(this).addClass("has-class");
                $(this).children('.tree-3').addClass("open");
                $(this).children("a").children("i.icon-arrow-down").toggleClass("icon-up");
            }
        }
    });

    //sub li click (tree-4)
    $(".tree-3 .nav-sub-item-4").on('click', function(e) {
        e.stopPropagation();
        if ($("body").hasClass("horizontal-fixed") || $("body").hasClass("horizontal-static") || $("body").hasClass("horizontal-icon") || $("body").hasClass("horizontal-icon-fixed") || $("body").hasClass("menu-collapsed")) {
            return;
        } else {
            if ($(this).hasClass("has-class") && $(this).children('.tree-4').hasClass("open")) {
                $(this).children("ul").slideToggle();
                $(this).children('.tree-4').removeClass("open");
                $(this).removeClass("has-class");
                $(this).children("a").children("i.icon-arrow-down").toggleClass("icon-up");
            } else {
                $(".tree-3 .nav-sub-item-4 ul").css('display', 'none');
                $(this).children("ul").slideToggle();
                $(".tree-3 .nav-sub-item-4").removeClass("open").removeClass("has-class");
                $(this).addClass("has-class");
                $(this).children('.tree-4').addClass("open");
                $(this).children("a").children("i.icon-arrow-down").toggleClass("icon-up");
            }
        }
    });
    //menu collapse end




    //Menu layout end

    /*chatbar js start*/
    /*chat box scroll*/
    // var a = $(window).height() - 50;
    // $(".main-friend-list").slimScroll({
    //     height: a,
    //     allowPageScroll: true,
    //     wheelStep: 5,
    //     color: '#1b8bf9'
    // });

    // // search
    // $("#search-friends").on("keyup", function() {
    //     var g = $(this).val().toLowerCase();
    //     $(".userlist-box .media-body .chat-header").each(function() {
    //         var s = $(this).text().toLowerCase();
    //         $(this).closest('.userlist-box')[s.indexOf(g) !== -1 ? 'show' : 'hide']();
    //     });
    // });

    // open chat box
    $('.displayChatbox').on('click', function() {
        var options = {
            direction: 'right'
        };
        $('.showChat').toggle('slide', options, 500);
    });

    // $(document).on('click',function(e){

    //         
    //       $('.showChat').hide();

    //  });

    //open friend chat
    $('.userlist-box').on('click', function() {
        var options = {
            direction: 'right'
        };
        $('.showChat_inner').toggle('slide', options, 500);
    });
    //back to main chatbar
    $('.back_chatBox').on('click', function() {
        var options = {
            direction: 'right'
        };
        $('.showChat_inner').toggle('slide', options, 500);
        $('.showChat').css('display', 'block');
    });
    // /*chatbar js end*/

    //Language chage dropdown start
    // i18next.use(window.i18nextXHRBackend).init({
    //             debug: !1,
    //             fallbackLng: !1,
    //             backend: {
    //                 loadPath: "assets/locales/{{lng}}/{{ns}}.json"
    //             },
    //             returnObjects: !0
    //         },
    //         function(err, t) {
    //             jqueryI18next.init(i18next, $)
    //         }),
    //     $(".lng-dropdown a").on("click", function() {

    //         var $this = $(this),
    //             selected_lng = $this.data("lng");
    //         i18next.changeLanguage(selected_lng, function(err, t) {
    //                 $(".main-menu-content").localize()
    //             }),
    //             $this.parent("li").siblings("li").children("a").removeClass("active"), $this.addClass("active"), $(".lng-dropdown a").removeClass("active");
    //         var drop_lng = $('.lng-dropdown a[data-lng="' + selected_lng + '"]').addClass("active");
    //         $(".lng-dropdown #dropdown-active-item").html(drop_lng.html())
    //     });
        //Language chage dropdown end
});

// toggle full screen
function toggleFullScreen() {
    var a = $(window).height() - 10;
    $('.main-menu-content').css('min-height', a);
    if (Modernizr.cssscrollbar) {
        $(".main-menu-content").slimScroll({
            height: a,
            allowPageScroll: true,
            wheelStep: 5,
            color: '#fff',
            animate: true
        });
    }
    if (!document.fullscreenElement && // alternative standard method
        !document.mozFullScreenElement && !document.webkitFullscreenElement) { // current working methods
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}

//light box
// $(document).on('click', '[data-toggle="lightbox"]', function(event) {
//     event.preventDefault();
//     $(this).ekkoLightbox();
// });




