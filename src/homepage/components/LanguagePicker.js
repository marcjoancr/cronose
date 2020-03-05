import React, { Component } from 'react';
import $ from 'jquery';

class LanguagePicker extends Component {
	componentDidMount() {
		$('.btnlan').click(function() {
			$('.btnlan').removeClass('active');
			$(this).addClass('active');
		});
	}
	render() {
		const { changeLanguage } = this.props;
		return (
			<div class='btn-group languagesButtons' role='group'>
				<button
					id='en'
					type='button'
					class='btn btnlan'
					onClick={changeLanguage}>
					EN
				</button>
				<button
					id='es'
					type='button'
					class='btn btnlan'
					onClick={changeLanguage}>
					ES
				</button>
				<button
					id='ca'
					type='button'
					class='btn btnlan active'
					onClick={changeLanguage}>
					CA
				</button>
			</div>
		);
	}
}

export default LanguagePicker;
