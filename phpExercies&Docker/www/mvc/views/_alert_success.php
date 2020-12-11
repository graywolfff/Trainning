<div class="alert alert alert-success fade show" id="success_alert" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<script>
    $(document).ready(function() {
        $("#success_alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success_alert").slideUp(500);
        });

    });
</script>
