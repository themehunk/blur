import { useState, useEffect } from 'react';

function PluginData() {
  const [data, setData] = useState([]);

  useEffect(() => {
    fetch('https://api.wordpress.org/plugins/info/1.0/th-advance-product-search.json')
      .then(response => response.json())
      .then(data => setData(data));
  }, []);

  return (
    <div>
      <h1>My Plugin Data</h1>
      <ul>
        {console.log(data) }
      </ul>
    </div>
  );
}

export default PluginData;