import React, { Component } from "react";
import Axios from "axios";

export default class Setting extends Component {
  constructor(props) {
    super(props);

    this.state = { theme: "" };

    this.setChoice = this.setChoice.bind(this);
    this.apply = this.apply.bind(this);
  }

  componentDidMount() {
    if (this.props.app_conf) {
      this.setState({
        theme: this.props.app_conf.default_theme
          ? this.props.app_conf.default_theme
          : "light"
      });
    }
  }

  setChoice(e) {
    this.setState({ theme: e.target.value });
  }

  apply() {
    Axios.get(`/table/public/api/test/${this.state.theme}`).then(res => {
      console.log(res.data);
    });
  }

  render() {
    return (
      <div className="setting">
        <div className="setting__sub-header">
          {this.props.app_conf.setting_theme}
        </div>
        <div className="setting__choice-pannel">
          <div className="theme-setting-item">
            <label className="theme-setting-container">
              <input
                type="checkbox"
                name="theme"
                value="light"
                onChange={this.setChoice}
              />
              <span className="checkmark-wrap">
                <div className="choice-group__icon-cover" />
              </span>
            </label>
            <span className="choice-group__choice-info">
              <span className="theme-setting-name">light</span>
            </span>
          </div>
        </div>
        <div className="setting__choice-pannel">
          <div className="theme-setting-item">
            <label className="theme-setting-container">
              <input
                type="checkbox"
                name="theme"
                value="dark"
                onChange={this.setChoice}
              />
              <span className="checkmark-wrap">
                <div className="choice-group__icon-cover" />
              </span>
            </label>
            <span className="choice-group__choice-info">
              <span className="theme-setting-name">dark</span>
            </span>
          </div>
        </div>
        <div className="apply-button" onClick={this.apply}>
          Apply
        </div>
      </div>
    );
  }
}
