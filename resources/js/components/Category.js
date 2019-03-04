import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import AddCategory from './AddCategory';
import Categories from './Categories';

export default class Category extends Component {
    render() {
        return (
            <div className="container">
                <AddCategory  />
                <div className="container">&nbsp;</div>
                <Categories  />
            </div>
        );
    }
}

if (document.getElementById('apiCategory')) {
    ReactDOM.render(<Category />, document.getElementById('apiCategory'));
}
