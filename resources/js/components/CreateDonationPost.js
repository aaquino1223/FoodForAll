import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class CreateDonationPost extends Component {
    constructor(props) {
        super(props);
        this.state = {
            postType: 1,
            addingDonations: true,
            donations: [
                {
                    foodItem: '',
                    foodAmount: '',
                    foodMeasure: ''
                }
            ],
            viewRestrictionTypes: [],
            ViewRestrictionType: null,
            Title: '',
            Message: ''
        };
        this.addDonationItem = this.addDonationItem.bind(this);
        this.goToPost = this.goToPost.bind(this);
        this.handleTitleChange = this.handleTitleChange.bind(this);
        this.handleMessageChange = this.handleMessageChange.bind(this);
    }

    handleFoodItemChange(index, event) {
        const newDonations = this.state.donations.map((donation, dIndex) => {
            if (index !== dIndex) return donation;
            return { ...donation, foodItem: event.target.value };
        });

        this.setState({ donations: newDonations });
    }

    handleTitleChange(event) {
        this.setState({Title: event.target.value});
    }

    handleMessageChange(event) {
        this.setState({Message: event.target.value});
    }

    handleFoodAmountChange(index, event) {
        const newDonations = this.state.donations.map((donation, dIndex) => {
            if (index !== dIndex) return donation;
            return { ...donation, foodAmount: event.target.value };
        });

        this.setState({ donations: newDonations });
    }

    handleFoodMeasureChange(index, event) {
        const newDonations = this.state.donations.map((donation, dIndex) => {
            if (index !== dIndex) return donation;
            return { ...donation, foodMeasure: event.target.value };
        });

        this.setState({ donations: newDonations });
    }

    changePostType(postType) {
        this.setState({postType: postType});
    }

    changeViewRestrictionType(viewRestrictionTypeId) {
        let viewRestrictionType = this.state.viewRestrictionTypes.find((type) => {
            return type.ViewRestrictionTypeId == viewRestrictionTypeId
        });
        this.setState({ViewRestrictionType: viewRestrictionType});
    }

    goToPost() {
        this.setState({addingDonations: false});
    }

    removeDonationItem(index) {
        this.setState({
            donations: this.state.donations.filter((donation, dIndex) => index !== dIndex)
        });
    }

    addDonationItem() {
        this.setState({
            donations: this.state.donations.concat([{
                foodItem: '',
                foodAmount: '',
                foodMeasure: ''
            }])
        });
    }

    componentDidMount () {
        axios.get('/post').then(response => {
            this.setState({
                viewRestrictionTypes: response.data,
                ViewRestrictionType: response.data[0]
            });
        })
    }

    ShowForm() {
        if (this.state.addingDonations && this.state.postType === 1) {
            return (
                <div>
                    {this.state.donations.map((item, index) => {
                        return (
                            <div key={index} className="card bg-light mb-3" style={{maxWidth: '36rem'}}>
                                <div className="card-header">Food Item #{index + 1}
                                    <button type="button" className="close" aria-label="Close"
                                            onClick={event => this.removeDonationItem(index)}>
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div className="card-body">
                                    <div className="form-group">
                                        <input type="text" className="form-control" id="foodItem"
                                               aria-describedby="which food"
                                               placeholder="Which food item are you donating?" value={item.foodItem}
                                               required
                                               onChange={event => this.handleFoodItemChange(index, event)}/>
                                    </div>
                                    <div className="form-group">
                                        <input type="number" min="1" className="form-control" id="numItem"
                                               aria-describedby="how many" placeholder="How many?"
                                               value={item.foodAmount}
                                               onChange={event => this.handleFoodAmountChange(index, event)}/>
                                    </div>
                                    <div className="form-group">
                                        <input type="text" className="form-control" id="measureItem"
                                               aria-describedby="what measure"
                                               placeholder="In what measure? e.g. servings, oz, lbs"
                                               value={item.foodMeasure}
                                               onChange={event => this.handleFoodMeasureChange(index, event)}/>
                                    </div>
                                </div>
                            </div>
                        );
                    })}
                    <div className="row">
                        <div className="col-8">
                            <button type="button" className="btn btn-default" aria-label="Add" onClick={this.addDonationItem}
                                    style={{ width: '50px', height: '50px'}}>
                                <img src={require('../../assets/adding.svg')} className="img-fluid" alt="Add"/>
                            </button>
                        </div>
                        <div className="col-4 align-self-center">
                            <button type="button" className="btn btn-link" data-dismiss="modal">Cancel</button>
                            <button type="button" className="btn btn-primary" onClick={this.goToPost}>Next</button>
                        </div>
                    </div>
                </div>);
        }
        else {
            return (
                <div>
                    <div className="row justify-content-end">
                        <div className="col-7 align-self-center">
                            <label htmlFor="dropdownMenuButton">Who can see?</label>
                        </div>
                        <div className="dropdown mb-2 col-4 align-self-center">
                            <button className="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                {this.state.ViewRestrictionType != null ? this.state.ViewRestrictionType.Description : 'Everyone'}
                            </button>
                            <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                {this.state.viewRestrictionTypes.map((viewRestrictionType) => {
                                    return (<a key={viewRestrictionType.ViewRestrictionTypeId}
                                               onClick={event => this.changeViewRestrictionType(viewRestrictionType.ViewRestrictionTypeId)}
                                               className="dropdown-item" href="#">{viewRestrictionType.Description}</a>)
                                })}
                            </div>
                        </div>
                    </div>
                    <div className="form-group">
                        <input type="text" className="form-control" id="exampleTitle" maxLength="50"
                               aria-describedby="titleHelp" placeholder="Title/Subject" value={this.state.Title}
                               onChange={this.handleTitleChange}/>
                    </div>
                    <div className="form-group">
                        <textarea className="form-control" id="exampleFormControlTextarea1" maxLength="500" rows="3"
                                  placeholder="Anything else to add?" value={this.state.Message}
                                  onChange={this.handleMessageChange}/>
                    </div>
                    <div className="row">
                        <div className="col-8">
                            <button type="button" className="btn btn-default" aria-label="Picture"
                                    style={{ width: '50px', height: '50px'}}>
                                <img src={require('../../assets/camera.svg')} className="img-fluid" alt="Picture"/>
                            </button>
                            <button type="button" className="btn btn-default" aria-label="Video"
                                    style={{ width: '50px', height: '50px'}}>
                                <img src={require('../../assets/video-camera.svg')} className="img-fluid" alt="Video"/>
                            </button>
                            <button type="button" className="btn btn-default" aria-label="Location"
                                    style={{ width: '50px', height: '50px'}}>
                                <img src={require('../../assets/pin.svg')} className="img-fluid" alt="Location"/>
                            </button>
                        </div>
                        <div className="col-4 align-self-center">
                            <button type="button" className="btn btn-link" data-dismiss="modal">Cancel</button>
                            <button type="submit" className="btn btn-primary">Post</button>
                        </div>
                    </div>
                </div>);
        }
    };
    render() {
        return (
            <div >
                <form>
                    <div className="card">
                        <div className="card-header">
                            <ul className="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                <li className="nav-item">
                                    <a onClick={event => this.changePostType(1)} className="nav-link active" id="pills-donation-tab" data-toggle="pill" href="#pills-donation" role="tab" aria-controls="pills-donation" aria-selected="true">Donation</a>
                                </li>
                                <li className="nav-item">
                                    <a onClick={event => this.changePostType(2)} className="nav-link" id="pills-event-tab" data-toggle="pill" href="#pills-event" role="tab" aria-controls="pills-event" aria-selected="false">Event</a>
                                </li>
                                <li className="nav-item">
                                    <a onClick={event => this.changePostType(3)} className="nav-link" id="pills-help-tab" data-toggle="pill" href="#pills-help" role="tab" aria-controls="pills-help" aria-selected="false">Help</a>
                                </li>
                                <li className="nav-item">
                                    <a onClick={event => this.changePostType(4)} className="nav-link" id="pills-other-tab" data-toggle="pill" href="#pills-other" role="tab" aria-controls="pills-other" aria-selected="false">Other</a>
                                </li>
                            </ul>
                            <div className="tab-content" id="pills-tabContent">
                                {this.ShowForm()}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        );
    }
}

if (document.getElementById('donationForm')) {
    ReactDOM.render(<CreateDonationPost />, document.getElementById('donationForm'));
}
