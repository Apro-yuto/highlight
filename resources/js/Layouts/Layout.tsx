import React, { ReactNode } from 'react'
import Header from '@/js/components/Header'

interface Props {
  children: ReactNode
}

const Layout: React.VFC<Props> = ({ children }) => {
  return (
    <main>
      <Header />
      <article>{children}</article>
    </main>
  )
}

export default Layout
