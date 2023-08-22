<a class="text-decoration-none mx-1" href="{{ route('backoffice.policy.edit', $policy) }}"><button class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></button></a>
<a class="text-decoration-none mx-1"><button class="btn btn-danger btn-sm" title="Delete" id="submitBtn"><i class="fas fa-trash"></i></button></a>
<form id="myForm" action="{{ route('backoffice.policy.destroy', $policy) }}" method="post">
    @csrf
    @method('delete')
</form>

<script>
    $(document).ready(function() {
        $("#submitBtn").on("click", function() {
            $("#myForm").submit();
        });
    });
</script>