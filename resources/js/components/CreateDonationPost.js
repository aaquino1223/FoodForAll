import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class CreateDonationPost extends Component {
    constructor(props) {
        super(props);
        this.state = {
            addingDonations: true,
            donations: [
                {
                    foodItem: '',
                    foodAmount: '',
                    foodMeasure: ''
                }
            ]
        };

    }

    goToPost() {
        this.setState({addingDonations: false});
    }

    addDonationItem() {
        let current = this.state.donations;
        current.push({
            foodItem: '',
            foodAmount: '',
            foodMeasure: ''
        });
        this.setState({donations: current});
    }

    render() {
        return (
            <div >
                {
                    this.state.donations.map((item) => {
                    return <div className="card bg-light mb-3" style={{ maxWidth: '36rem'}}>
                                <div className="card-header">Food Item #{{index}}
                                    <button type="button" className="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div className="card-body">
                                    <div className="form-group">
                                        <input type="text" className="form-control" id="foodItem" aria-describedby="which food"
                                               placeholder="Which food item are you donating?" value={item.foodItem}/>
                                    </div>
                                    <div className="form-group">
                                        <input type="number" min="1" className="form-control" id="numItem"
                                               aria-describedby="how many" placeholder="How many?" value={item.foodAmount}/>
                                    </div>
                                    <div className="form-group">
                                        <input type="text" className="form-control" id="measureItem" aria-describedby="what measure"
                                               placeholder="In what measure? e.g. servings, oz, lbs" value={item.foodMeasure}/>
                                    </div>
                                </div>
                            </div>
                })}
                <div className="row">
                    <div className="col-8">
                        <button type="button" className="btn btn-default" aria-label="Add" onClick={this.addDonationItem}
                                style={{ width: '50px', height: '50px'}}>
                            <img src={require('../../assets/adding.svg')} className="img-fluid" alt="Add"/>
                        </button>
                    </div>
                    <div className="col-4 align-self-center">
                        <button type="button" className="btn btn-link">Cancel</button>
                        <button type="button" className="btn btn-primary" onClick={this.goToPost}>Next</button>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('donationForm')) {
    ReactDOM.render(<CreateDonationPost />, document.getElementById('donationForm'));
}
