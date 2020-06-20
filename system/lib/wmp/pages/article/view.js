import LayoutPage,{chanzhi} from '../../core/layout-page.js';

LayoutPage({
    onDataLoad: data => {
        data.messageObjectType = "article";
        data.messageObjectID   = data.data.article.id;
        data.messageParam = {type : 'comment'};
        return data;
    }, 
    onMessageLoad: data => {},
});
