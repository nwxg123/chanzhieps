import LayoutPage from '../../core/layout-page.js';

LayoutPage({
  onDataLoad: data => {
    data.data.video.hideCover = false
    data.data.video.src = ''
    data.data.video.style = data.data.video.height != '' ? 'height:' + data.data.video.height * 2 + 'rpx;' : ''
    return data;
  },

  bindPlay: function (e) {
    this.data.data.video.hideCover = true
    this.setData(this.data)
  },

  bindPause: function (e) {
    this.data.data.video.hideCover = false
    this.setData(this.data)
  },

  playVideo: function (e) {
    var videoSrc = e.target.dataset.videosrc

    this.data.data.video.src = videoSrc
    this.setData(this.data)
  },
})