import React from 'react';
import ReactDOM from 'react-dom';
import Axios from 'axios';

class Example extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            expenses: []
        };
    }
    componentDidMount() {
        Axios.get('http://127.0.0.1:8000/admin/expense').then(response => response.data)
            .then((data) => {
                this.setState({ expenses: data.data })
                console.log(this.state.expenses)
            })
    }
    render() {
        return (
            <div className='container'>
                <div className='row justify-content-center'>
                    <div className='col-md-10'>
                        <table className="table">
                            <thead className="thead-light">
                                <tr>
                                    <th scope="col">Expense Item</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                {this.state.expenses.map((expense) => (
                                    <tr>
                                        <td>{expense.expense_item}</td>
                                        <td>{expense.amount}</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        )

    }
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
