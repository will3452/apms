@props(['id'=>\Str::random(7)])

<table {{ $attributes->merge([
    'id'=>"table$id"
])  }}>
{{ $slot }}
</table>
<script>
    $.fn.dataTable.ext.search.push();

    let table{{ $id }} =  $("#table{{ $id }}").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'print'
        ],
    });

</script>