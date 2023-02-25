import React, { useState, useEffect } from 'react';

function PluginData() {
  const [customData, setCustomData] = useState(null);

  useEffect(() => {
    fetch('/wp1/wp-json/blur/avd/')
      .then(response => response.json())
      .then(data => {
        setCustomData(data);
      });
  }, []);

  if (!customData) {
    return <div>Loading...</div>;
  }

  return (
    <div>
      <h2>{customData.title}</h2>
      <img src={customData.image_url} alt="Custom Image" />
      <p>{customData.description}</p>
    </div>
  );
}

export default PluginData;