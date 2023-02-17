import React, { useState, useEffect } from 'react';
import { __ } from '@wordpress/i18n';
import WelcomeContent from './WelcomeContent';
import HelpContent from './HelpContent';
import RecommendedContent from './RecommendedContent';

const TabContent = (props) => {
    const [settings, setSettings] = useState({});
    const [activeTab, setActiveTab] = useState('welcome');
    const handleTabClick = (tabName) => {
      setActiveTab(tabName);
    };
  return (
    <div className="blur-options-tab">
    <div className="blur-tabs">
        <button
          className={`tab welcome ${activeTab === 'welcome' ? 'active' : ''}`}
          onClick={() => handleTabClick('welcome')}
        >
          Welcome
        </button>
        <button
          className={`tab recommended ${activeTab === 'recommended' ? 'active' : ''}`}
          onClick={() => handleTabClick('recommended')}
        >
          Recommended Plugin
        </button>
        <button
          className={`tab demo ${activeTab === 'demo' ? 'active' : ''}`}
          onClick={() => handleTabClick('demo')}
        >
          Demo Import
        </button>
        <button
          className={`tab freevspro ${activeTab === 'freevspro' ? 'active' : ''}`}
          onClick={() => handleTabClick('freevspro')}
        >
          Free Vs Pro
        </button>
        <button
          className={`tab help ${activeTab === 'help' ? 'active' : ''}`}
          onClick={() => handleTabClick('help')}
        >
          Help
        </button>
      </div>
      <div className="tab-content">
        {activeTab === 'welcome' && (
          <div className="welcome-tab">
             <WelcomeContent/>
          </div>
        )}
        {activeTab === 'recommended' && (
          <div className="recommended-tab">
            <RecommendedContent/>
          </div>
        )}
        {activeTab === 'demo' && (
          <div className="demo-tab">
            <h2>Demo</h2>
            
          </div>
        )}
        {activeTab === 'freevspro' && (
          <div className="freevspro-tab">
            <h2>freevspro</h2>
            
          </div>
        )}
        {activeTab === 'help' && (
          <div className="help-tab">
           <HelpContent/>
            
          </div>
        )}
      </div>
    </div>
  );
};

export default TabContent;