function rendermenu(page)
{
    return '<nav>' +
        '<ul>' +
        '<li>' +
        (page==='home' ? "<b> Home </b>"
            : "<a href='kezdooldal.html'> Home </a>") +
        '</li>' +
        '<li>' +
        (page==='about' ? "<b> Magunkról </b>"
            : "<a href='magunkrol.html'> Magunkról </a>") +
        '</li>' +
        '<li>' +
        (page==='also' ? "<b> Alsó </b>"
            : "<a href='also.html'> Alsó </a>") +
        '</li>' +
        '<li>' +
        (page==='felso' ? "<b> Felső </b>"
            : "<a href='felso.html'> Felső </a>") +
        '</li>' +
        '<li>' +
        (page==='fiokom' ? "<b> Fiókom </b>"
            : "<a href='fiokom.html'> Fiókom </a>") +
        '</li>' +
        '</ul>' +
        '</nav>'
}