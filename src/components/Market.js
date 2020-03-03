import React, { Component } from 'react';
import Axios from 'axios';
import {
	IoIosArrowDroprightCircle,
	IoIosArrowDropleftCircle,
} from 'react-icons/io';
import WorkCard from './WorkCard';
import WorkDetail from './WorkDetail';

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
				<WorkDetail />
				{/* <div className='btn-search md-form mt-0'>
					<input
						className='form-control'
						type='text'
						placeholder='Search'
						aria-label='Search'></input>
				</div>
				<section className='works'>
					{this.state.works.map((work, index) => (
						<WorkCard key={index} work={work} />
					))}
				</section>
				<section className='works'>
					{this.state.works.map((work, index) => (
						<WorkCard key={index} work={work} />
					))}
				</section>
				<div className='' id='jobFilter'>
					<a href='#'>
						<IoIosArrowDroprightCircle />
					</a>
					<h2 className='p-3 pt-4 text-center'>Job Filter</h2>
					<div className='input-group p-2'>
						<div className='p-2 pt-4'>
							<label for='language'>Language</label>
							<br></br>
							<select className='' id='lang'></select>
						</div>
						<div className='p-2 pt-4 '>
							<label for='myLangs'>Selected Languages</label>
							<select className='' id='myLangs'>
								<br></br>
								<option disabled selected='selected'>
									My Langs
								</option>
							</select>
						</div>
						<div className='p-2 pt-4'>
							<label for='category'>Category</label>
							<br></br>
							<select className='' id='category'></select>
						</div>
						<div className='p-2 pt-4'>
							<label for='specialization'>Specialization</label>
							<select className='' id='specialization'>
								<br></br>
								<option disabled selected='selected' value='null'>
									Specializations
								</option>
							</select>
						</div>
						<div className='p-2 pt-4 pl-4'>
							<button id='reset'>Reset Filter</button>
						</div>
					</div>
				</div> */}
			</>
		);
	}
}
