import config from '../../config/index.js';
import LayoutPage from '../../core/layout-page.js';

LayoutPage({
  onDataLoad: data => {
    var newVideos = []
    Object.keys(data.data.videos).forEach(videoID => {
      const video = data.data.videos[videoID]
      if (video) {
        video.video = JSON.parse(video.video)
        video.hideCover = false
        video.src = ''
        video.style = video.video.height != '' ? 'height:' + video.video.height * 2 + 'rpx;' : ''
      }
      newVideos.push(video)
    })
    data.data.videos = newVideos
    return data
  },

  bindPlay: function (e) {
    var videoIndex = e.target.dataset.index
    var video = this.data.data.videos[videoIndex]

    video.hideCover = true
    this.setData(this.data)

    var playVideoID = e.target.dataset.videoid
    if (playVideoID != this.data.playVideoID) {
      var videoContextPrev = wx.createVideoContext('video' + this.data.playVideoID)
      videoContextPrev.pause()
      this.setData({
        playVideoID: playVideoID
      })
    }

    wx.request({
      url: config.root + 'wmp.php?m=video&f=updateViews',
      data: { 'videoID': playVideoID },
      method: 'GET',
      dataType: 'json',
      responseType: 'text',
      success: function (res) {},
    })
  },

  bindPause: function (e) {
    this.data.data.videos[e.target.dataset.index].hideCover = false
    this.setData(this.data)
  },

  playVideo: function (e) {
    var videoIndex = e.target.dataset.index
    var videoSrc = e.target.dataset.videosrc
    var video = this.data.data.videos[videoIndex]

    if (typeof (video.access) !== "undefined" && typeof (video.access.result) !== "undefined" && video.access.result === 'fail') {
      var msg = video.access.titleList[0].replace(/\s<[^>]*>/, '【').replace(/\s<\/[^>]*>/, '】')
      wx.showModal({
        title: video.access.title,
        content: msg,
        confirmText: '我知道了',
        showCancel: false,
      })
      return
    }

    this.data.data.videos[videoIndex].src = videoSrc
    this.setData(this.data)
  },

  redirectTo: function (e) {
    wx.redirectTo({
      url: e.target.dataset.url
    })
  }

})
