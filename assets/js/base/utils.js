export default class Utils {
    constructor() {
        this.init();
    }

    init() {
    this.fetchUsers();
    }
fetchUsers() {
    fetch('https://api.github.com/repos/womenintechnology/bootcamp-team-i/contributors')
  .then(response => response.json())
  .then(data => {
    
      var userDiv = "";
   

      var row = document.getElementById('github-user');

      data.forEach(element => {
          if(element.type == "User" && (element.login === 'smirkowska' || element.login === 'jsowinska' || element.login === 'WeronikaJurkiewicz') ){
            // twoj kod
          
            var userHtml =  `
            <div class="col-sm-3 u-margin--small person-box">
            <img class="person-box__img" src="${element.avatar_url}" alt="${element.login}">
            <div class="person-box__description">
                <h4 class="u-center-text u-margin-small">${element.login}</h4>
            </div>	
        </div>
            `;
        
        userDiv += userHtml; 
        
            
          }
      });
      row.innerHTML = userDiv;
  })
  .catch(error => console.log (error));
}
}