import { InertiaApp } from '@inertiajs/inertia-react'
import React from 'react'
import { render } from 'react-dom'
import '@/sass/login.scss'
import Layout from '@/js/Layouts/Layout'

const app = document.getElementById('app')
const pages = import.meta.glob('./Pages/**/*.tsx')

render(
  <InertiaApp
    initialPage={JSON.parse(app.dataset.page)}
    resolveComponent={(name) =>
      pages[`./Pages/${name}.tsx`]().then((module) => {
        const pageDefault = module.default

        if (pageDefault.layout === undefined)
          pageDefault.layout = (page) => <Layout>{page}</Layout>
        return pageDefault
      })
    }
  />,
  app,
)
