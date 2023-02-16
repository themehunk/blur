import React, { useState, useEffect } from 'react';

const TabContent = (props) => {

  return (
      <div className="tab-content">
        {props.tabactiveval === 'welcome' && (
          <div className="welcome-tab">
            <h2>Welcome</h2>
            
          </div>
        )}
        {props.tabactiveval === 'recommended' && (
          <div className="recommended-tab">
            <h2>Recommended Options</h2>
            
          </div>
        )}
        {props.tabactiveval === 'demo' && (
          <div className="demo-tab">
            <h2>Demo</h2>
            
          </div>
        )}
        {props.tabactiveval === 'help' && (
          <div className="help-tab">
            <h2>Help</h2>
            
          </div>
        )}
      </div>
  );
};

export default TabContent;