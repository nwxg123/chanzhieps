import LayoutPage from '../../core/layout-page.js';

LayoutPage({
  onDataLoad: data => {
    var newResults = []
    Object.keys(data.data.results).forEach(resultID => {
      const result = data.data.results[resultID]
      if(result)
      {
        result.title   = result.title.replace(/<span class='text-danger'>/g,'');
        result.title   = result.title.replace(/<\/span>/g,'');
        result.title   = result.title.replace(/&nbsp/g,'');
        result.summary = result.summary.replace(/<span class='text-danger'>/g,'');
        result.summary = result.summary.replace(/<\/span>/g,'');
        result.summary = result.summary.replace(/&nbsp/g,'');
        if(result.objectType == 'page' || result.objectType == 'video' || result.objectType == 'article' || result.objectType == 'product')
        {
            newResults.push(result)
        }
      }
    })
    data.data.results = newResults
    return data
  },
});
