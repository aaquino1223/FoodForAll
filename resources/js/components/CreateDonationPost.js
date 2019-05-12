import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class CreateDonationPost extends Component {
    render() {
        return (
            <div >
                <div className="card bg-light mb-3" style={{ maxWidth: '36rem'}}>
                    <div className="card-header">Food Item #1
                        <button type="button" className="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div className="card-body">
                        <div className="form-group">
                            <input type="text" className="form-control" id="fooditem" aria-describedby="whichfood"
                                   placeholder="Which food item are you donating?"/>
                        </div>
                        <div className="form-group">
                            <input type="number" min="1" className="form-control" id="fooditem"
                                   aria-describedby="howmany" placeholder="How many?"/>
                        </div>
                        <div className="form-group">
                            <input type="text" className="form-control" id="fooditem" aria-describedby="whatmeasure"
                                   placeholder="In what measure? e.g. servings, oz, lbs"/>
                        </div>
                    </div>
                </div>
                <div className="row">
                    <div className="col-8">
                        <button type="button" className="btn btn-default" aria-label="Add"
                                style={{ width: '50px', height: '50px'}}>
                            <img src={require('../../assets/adding.svg')} className="img-fluid" alt="Add"/>
                        </button>
                    </div>
                    <div className="col-4 align-self-center">
                        <button type="button" className="btn btn-link">Cancel</button>
                        <button type="submit" className="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('donationForm')) {
    ReactDOM.render(<CreateDonationPost />, document.getElementById('donationForm'));
}
