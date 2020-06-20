import LayoutPage from '../../core/layout-page.js';

LayoutPage({
    onDataLoad: data => {
        Object.keys(data.data.articles).forEach(articleID => {
            const article = data.data.articles[articleID];
            if (article) {
                if (Object.keys(data.data.sticks).indexOf(articleID) != -1) {
                    delete data.data.articles[articleID];
                }
                if (article.addedDate && article.addedDate.length >= 19) {
                    article.addedDate = article.addedDate.substr(0, 16);
                }
            }
        })
        return data;
    }
});
