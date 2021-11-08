import React from 'react'
import WorkerList from '@/js/components/Example'
import { InertiaLink } from '@inertiajs/inertia-react'

interface Props {
  data: Array<string>
  user: {
    name: string
  }
}
const Reg: React.VFC<Props> = (props) => {
  return (
    <>
      <InertiaLink href="/logout" as="button" method="POST">
        LOGOUT
      </InertiaLink>
      {props.user.name}
      <WorkerList workerArr={props.data} />
    </>
  )
}

export default Reg
