<div class="card bg-light mb-3" style="max-width: 36rem">
    <div class="card-header">Food Item #1
        <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="card-body">
        <div class="form-group">
            <input type="text" class="form-control" id="fooditem" aria-describedby="whichfood" placeholder="Which food item are you donating?">
        </div>
        <div class="form-group">
            <input type="number" min="1" class="form-control" id="fooditem" aria-describedby="howmany" placeholder="How many?">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="fooditem" aria-describedby="whatmeasure" placeholder="In what measure? e.g. servings, oz, lbs">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-8">
        <button type="button" class="btn btn-default" aria-label="Add" style="width: 50px; height: 50px">
            <img src="{{asset('/assets/adding.svg')}}" class="img-fluid" alt="Add">
        </button>
    </div>
    <div class="col-4 align-self-center">
        <button type="button" class="btn btn-link">Cancel</button>
        <button type="submit" class="btn btn-primary">Next</button>
    </div>
</div>