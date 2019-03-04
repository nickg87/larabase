import axios from 'axios'
import React, { Component } from 'react';

class AddCategory extends Component {
    constructor(props) {
        super(props);
        this.state ={
            name:'',
            description:'',
            catall:[]
        };
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleName = this.handleName.bind(this);
        this.handleDescription = this.handleDescription.bind(this);
        //this.postData = this.postData.bind(this);
    }

    handleSubmit(e) {
         e.preventDefault();
         //this.postData();
            axios
                .post('/api/category', {
                name: this.state.name,
                description:this.state.description
            })
                .then(response => {
                    this.setState({
                        catall: [...this.state.categories, response.data]
                    })
                    }
                );
            this.setState({
                name:'',
                description:'',
            })
            description.value = "";

    }

    postData() {99
        axios.post('/api/category', {
           name: this.state.name,
           description:this.state.description
        });
    }
    handleName(e) {
        this.setState({
            name: e.target.value
        })
    }
    handleDescription(e) {
        this.setState({
            description : e.target.value
        })
    }

    render() {
        return (
            <form className="form-horizontal" onSubmit={this.handleSubmit}>
            <div className="card-body card-block">
                <div className="col col-md-3">
                    <label htmlFor="name" className=" form-control-label">Category name*</label>
                </div>
                <div className="col-12 col-md-9">
                    <input ref={ ( input ) => this.name = input } type="text" maxLength="255" value={this.state.name} onChange={this.handleName} className="form-control" placeholder="Title" required />
                </div>
                <div className="col col-md-3">
                    <label htmlFor="description" className=" form-control-label">Category description</label>
                </div>
                <div className="col-12 col-md-9">
                    <textarea ref="description" id="description" rows="3" onChange={this.handleDescription} className="form-control" required  placeholder="Description.." defaultValue={this.state.description}></textarea>
                </div>
            </div>
            <div className="footer">
                <button className="btn btn-primary btn-sm" type="submit">Add new category</button>
            </div>
            </form>
        );
    }
}

export default AddCategory;