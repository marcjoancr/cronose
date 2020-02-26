import React, { Component } from 'react';
import Axios from 'axios';
import WorkCard from './WorkCard';

export default class Market extends Component {
	constructor(props) {
		super(props);
		this.state = { works: [{ title: 'Sample Work Title' }] };
		this.getWorks = this.getWorks.bind(this);
	}

	componentDidMount() {
		this.getWorks();
	}

	getWorks() {
		Axios.get(`${process.env.REACT_APP_API_URL}/works`)
			.then((response) =>
				this.setState({ works: response.data.works || this.state.works })
			)
			.catch((err) => console.error(err));
	}

	render() {
		return (
			<>
				<div class='btn-search md-form mt-0'>
					<input
						class='form-control'
						type='text'
						placeholder='Search'
						aria-label='Search'></input>
				</div>
				<section className='works'>
					{this.state.works.map((work, index) => (
						<WorkCard key={index} work={work} />
					))}
				</section>
			</>
		);
	}
}
