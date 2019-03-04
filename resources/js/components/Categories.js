import axios from 'axios'
import React, { Component } from 'react'

class Categories extends Component {
    constructor () {
        super()
        this.state = {
            categories: []
        }
    }

    componentDidMount () {
        axios.get('/api/category').then(response => {
            this.setState({
                categories: response.data
            })
        })
    }

    render () {
        const { categories } = this.state
        return (
            <div className="table-responsive table--no-card m-b-30">
                <table className="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category Description</th>
                        <th>date added</th>
                        <th className="text-right">date modified</th>
                        <th className="text-right">activ</th>
                        <th className="text-right"></th>
                    </tr>
                    </thead>
                    <tbody>
                    {categories.map((category, index) => (
                        <tr key={index}>
                            <td>{category.id} </td>
                            <td>{category.name} </td>
                            <td dangerouslySetInnerHTML={{__html: category.description}}></td>
                            <td>{category.created_at}</td>
                            <td className="text-right">{category.updated_at}</td>
                            <td className="text-right">&nbsp;</td>
                            <td className="text-right"></td>
                        </tr>
                    ))}
                    </tbody>
                    </table>
                    </div>
        )
    }
}

export default Categories