import React, { Component } from 'react';
import Axios from 'axios';
import WorkCard from './WorkCard';

export default class Market extends Component {
	constructor(props) {
		super(props);
		this.state = { works: [] };
		this.getWorks = this.getWorks.bind(this);
	}

	componentDidMount() {
		this.getWorks();
	}

	getWorks() {
		Axios.get('http://localhost:3030/api/works')
			.then((response) => this.setState({ works: response.data.works }))
			.catch((err) => console.error(err));
	}

	render() {
		return (
			<section className='works'>
				{this.state.works.map((work, index) => (
					<WorkCard key={index} work={work} />
				))}
			</section>
		);
	}
}
