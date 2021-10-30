import { InertiaApp } from '@inertiajs/inertia-react'
import React from 'react'
import { render } from 'react-dom'

const app = document.getElementById('app')
const pages = import.meta.glob('./Pages/**/*.tsx')

render(
  <InertiaApp
    initialPage={JSON.parse(app.dataset.page)}
    resolveComponent={
      name => pages[`./Pages/${name}.tsx`]()
        .then(module => module.default)
    }
  />,
  app
)