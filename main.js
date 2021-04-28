const { app, BrowserWindow } = require('electron')

app.whenReady().then(() => {
    //Criando uma nova janela
    const minhaJanela = new BrowserWindow({
        width: 350,
        height: 530,
        resizable: false,
        webPreferences: {
            nodeIntegration: true,
        }
    });


    //Carregando a página html
    minhaJanela.loadFile('index.html');

    //retira a barra de menus da janela
    minhaJanela.menuBarVisible = false;

})
