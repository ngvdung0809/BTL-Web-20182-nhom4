$(document).ready(function(){
    var orderBy = 'asc';
    var totalComments = $('.pagination').data('total_comment');
    var commentPerPage = 5;
    if(totalComments%commentPerPage == 0){
        totalPageComments = totalComments/commentPerPage;
    } else{
        totalPageComments = parseInt(totalComments/commentPerPage) + 1;
    }

    $('.pagination').twbsPagination({
        totalPages: totalPageComments,
        // the current page that show on start
        startPage: 1,

        // maximum visible pages
        visiblePages: 5,

        initiateStartPageClick: true,

        // template for pagination links
        href: false,

        // variable name in href template for page number
        hrefVariable: '{{number}}',

        // Text labels
        first: 'First',
        prev: 'Prev',
        next: 'Next',
        last: 'Last',

        // carousel-style pagination
        loop: false,

        // callback function
        onPageClick: function (event, page) {
            $('.comment-active').removeClass('comment-active');
            for(var i = (page - 1)*commentPerPage; i < (page)*commentPerPage; i++){
                $('#comment_'+i).addClass('comment-active');
            }
        },

        // pagination Classes
        paginationClass: 'pagination',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first',
        pageClass: 'comment',
        activeClass: 'active',
        disabledClass: 'disabled'

    });

    $('#comment_per_page').change(function(){
        commentPerPage = $(this).find(':selected').data('value');
        if(totalComments%commentPerPage == 0){
            totalPageComments = totalComments/commentPerPage;
        } else{
            totalPageComments = parseInt(totalComments/commentPerPage) + 1;
        }
        $('.pagination').twbsPagination("changeTotalPages", totalPageComments, $('.pagination').twbsPagination('getCurrentPage'));
    });

    $('#sort_comment').change(function(){
        $('#show_comment', this).remove();
        let sortBy = $(this).find(':selected').data('value');
        let comments = [];

        $('.comment-disactive').each(function(){
            $(this).removeClass('comment-active');
            let commentArr = [];

            commentArr.push($('.' + sortBy, this).text());
            commentArr.push($(this));
            comments.push(commentArr);
            comments.sort();
        });

        $('.comment-disactive').remove();

        if(orderBy == 'asc'){
            for(let i = 0; i < comments.length; i++){
                $('#sort-review').append(comments[i][1]);
            }
        }else{
            for(let i = comments.length - 1; i >= 0; i--){
                $('#sort-review').append(comments[i][1]);
            }
        }

        let dem = 0;
        $('.comment-disactive').each(function(){
            $(this).attr('id', 'comment_' + dem);
            dem++;
        });

        $('.pagination').twbsPagination("changeTotalPages", totalPageComments, $('.pagination').twbsPagination('getCurrentPage'));
    });

    $('#sort_comment_by').change(function(){
        orderBy = $(this).find(':selected').data('value');
        $('#sort_comment').trigger('change');
    });
});
