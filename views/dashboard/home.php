<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 text-center">
                <?=$message?>
                <h1>Bienvenue sur le tableau de bord !</h1>
            </div>
        </div>
    </div>
</main>

<div hidden>
    
</div>
<script >

var data = <?=  json_encode($json); ?>;
var arr = new Array();
arr = JSON.parse(data)
console.log(arr);
// document.write( arr[0].const1 );

</script>