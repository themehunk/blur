import React, { useState, useEffect } from 'react';

const TabBar = () => {
  
  const [settings, setSettings] = useState({});
  const [activeTab, setActiveTab] = useState('General');
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
          className={`tab help ${activeTab === 'help' ? 'active' : ''}`}
          onClick={() => handleTabClick('help')}
        >
          Help
        </button>
      </div>
      <input
              type="text"
              id="activetab"
              value={activeTab}
              
            />
    </div>
    
  );
};

export default TabBar;