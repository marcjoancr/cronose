import React, { Component } from 'react';

class LanguagePicker extends Component {
	// Renderitza els botons per canviar d'idioma
	render() {
		const { changeLanguage } = this.props;
		return (
			<div
				class='btn-group languagesButtons'
				role='group'
				aria-label='Basic example'>
				<button type='button' class='btn ' onClick={changeLanguage}>
					EN
				</button>
				<button type='button' class='btn ' onClick={changeLanguage}>
					ES
				</button>
				<button type='button' class='btn ' onClick={changeLanguage}>
					CA
				</button>
			</div>
		);
	}
}

export default LanguagePicker;
