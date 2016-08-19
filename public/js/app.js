const bookSchema = {
    'set': [
    'make book',
    'set chapter',
    'put some text',
    'get chapter'
  ],
  'models': {
    'book': {
            'chapter': '1 Forasmuch as many have taken in hand to set forth in order a declaration of those things which are most surely believed among us,'
        }
  }
}
function getData(item) {
    if(item === 'get chapter') {
    return bookSchema.models.book.chapter;
  }
}        
function outputSchema() {
  bookSchema.set.forEach(function(item, index, array) {
    if(item.indexOf('get') > -1) {
        document.getElementById("app").innerHTML = getData(item);
    }
  });
}
window.onload = function() {
  outputSchema();
}
//# sourceMappingURL=app.js.map
