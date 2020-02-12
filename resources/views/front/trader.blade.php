@extends("layouts.Frontend.dayz")

@section("content")
    <div style="padding-top: 50px"></div>
    <div class="row">
        <!-- column -->
        <trader-component></trader-component>
    </div>
@endsection
<script>
    import TraderComponent from "../../js/components/TraderComponent";
    export default {
        components: {TraderComponent}
    }
</script>
