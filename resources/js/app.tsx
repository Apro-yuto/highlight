import React from 'react'
import ReactDOM from 'react-dom'
import '../sass/app.scss'

const App: React.VFC = () => {
  return (
    <h1>TEST<span>TEST</span></h1>
  )
}

ReactDOM.render(
    <App />,
    document.getElementById('app')
)
