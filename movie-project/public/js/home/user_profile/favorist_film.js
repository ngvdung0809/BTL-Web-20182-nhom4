$(document).ready(function(){
    var searchBy = 'movie-item-style-2';
    var orderBy = 'asc';
    var totalFilms = $('.pagination2').data('total_films');
    var filmPerPage = 5;
    if(totalFilms%filmPerPage == 0){
        totalPageFilms = totalFilms/filmPerPage;
    } else{
        totalPageFilms = parseInt(totalFilms/filmPerPage) + 1;
    }

    $('.pagination2').twbsPagination({
        totalPages: totalPageFilms,
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
            $('.page-active').removeClass('page-active');
            for(var i = (page - 1)*filmPerPage; i < (page)*filmPerPage; i++){
                $('#film_'+i).addClass('page-active');
            }
        },

        // pagination Classes
        paginationClass: 'pagination',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first',
        pageClass: 'page',
        activeClass: 'active',
        disabledClass: 'disabled'

    });

    $('#film_per_page').change(function(){
        filmPerPage = $(this).find(':selected').data('value');
        if(totalFilms%filmPerPage == 0){
            totalPageFilms = totalFilms/filmPerPage;
        } else{
            totalPageFilms = parseInt(totalFilms/filmPerPage) + 1;
        }
        $('.pagination2').twbsPagination("changeTotalPages", totalPageFilms, $('.pagination2').twbsPagination('getCurrentPage'));
    });

    $('#sort').change(function(){
        $('#show', this).remove();
        let sortBy = $(this).find(':selected').data('value');
        let films = [];

        $('.page-disactive').each(function(){
            $(this).removeClass('page-active');
            let filmArr = [];

            filmArr.push($('.' + sortBy, this).text());
            filmArr.push($(this));
            films.push(filmArr);
            films.sort();
        });

        $('.page-disactive').remove();

        if(orderBy == 'asc'){
            for(let i = 0; i < films.length; i++){
                $('.flex-wrap-movielist').append(films[i][1]);
            }
        }else{
            for(let i = films.length - 1; i >= 0; i--){
                $('.flex-wrap-movielist').append(films[i][1]);
            }
        }

        let dem = 0;
        $('.page-disactive').each(function(){
            $(this).attr('id', 'film_' + dem);
            dem++;
        });

        $('.pagination2').twbsPagination("changeTotalPages", totalPageFilms, $('.pagination2').twbsPagination('getCurrentPage'));
    });

    $('#search').change(function(){
        $('#start', this).remove();
        searchBy = $(this).find(':selected').data('value');
        $('#search-criteria').val('');
    });

    $('#search-criteria').on('keyup', function() {
        let searchVal = $(this).val();
        let demFilm = 0;
        if ( searchVal != '' ){
            $('.page-disactive').removeClass('page-active');
            $('.' + searchBy).each(function(){
                if($(this).text().toUpperCase().indexOf(searchVal.toUpperCase()) != -1){
                    $(this).parents('.page-disactive').addClass('page-active');
                    demFilm++;
                }
            });
            $('#result').empty().append('Tìm thấy <span style="color: blue">' + demFilm +'</span> phim');
            $('#film_per_page').empty().append('<option>' + demFilm + ' phim</option>');
            $('.pagination2').twbsPagination('destroy');
        }else{
            $('.pagination2').twbsPagination("changeTotalPages", totalPageFilms, $('.pagination2').twbsPagination('getCurrentPage'));
            $('#film_per_page').empty().append('<option data-value="5">5 phim</option><option data-value="10">10 phim</option>');
        }
    });

    $('#sort_by').change(function(){
        orderBy = $(this).find(':selected').data('value');
        $('#sort').trigger('change');
    });
});
