<script type="text/javascript">
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });

    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var page=$(this).attr('href').split('page=')[1];
            getData(page);
            event.preventDefault();
        });

    });

    function getData(page){
        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                datatype: "html"
            }).done(function(data){

            $("#tag_container").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
            alert('No response from server');
        });
    }
</script>

<!-- Jquery JS-->
<script src="/vendor/jquery-3.2.1.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<!-- Bootstrap JS-->
<script src="/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="/vendor/slick/slick.min.js"></script>
<script src="/vendor/wow/wow.min.js"></script>
<script src="/vendor/animsition/animsition.min.js"></script>
<script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<script src="/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="/vendor/counter-up/jquery.counterup.min.js"></script>
<script src="/vendor/circle-progress/circle-progress.min.js"></script>
<script src="/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="/vendor/select2/select2.min.js"></script>

<script src="/vendor/vector-map/jquery.vmap.js"></script>
<script src="/vendor/vector-map/jquery.vmap.min.js"></script>
<script src="/vendor/vector-map/jquery.vmap.sampledata.js"></script>
<script src="/vendor/vector-map/jquery.vmap.world.js"></script>
<script src="/vendor/vector-map/jquery.vmap.brazil.js"></script>
<script src="/vendor/vector-map/jquery.vmap.europe.js"></script>
<script src="/vendor/vector-map/jquery.vmap.france.js"></script>
<script src="/vendor/vector-map/jquery.vmap.germany.js"></script>
<script src="/vendor/vector-map/jquery.vmap.russia.js"></script>
<script src="/vendor/vector-map/jquery.vmap.usa.js"></script>


<!-- Main JS-->
<script src="/backend/js/main.js"></script>


