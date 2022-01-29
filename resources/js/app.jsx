import { InertiaApp } from '@inertiajs/inertia-react'
import React from 'react'
import { render } from 'react-dom'
import '@/sass/login.scss'
import Layout from '@/js/Layouts/Layout'

const app = document.getElementById('app')

render(
  <InertiaApp
    initialPage={JSON.parse(app.dataset.page)}
    resolveComponent={async (name) => {
      const pages = import.meta.glob('./Pages/**/*.tsx')
      const module = await pages[`./Pages/${name}.tsx`]()
      const pageDefault = module.default

      pageDefault.layout = (page) => <Layout>{page}</Layout>
      return pageDefault
    }}
  />,
  app,
)
